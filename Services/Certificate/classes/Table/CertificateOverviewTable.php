<?php

/**
 * This file is part of ILIAS, a powerful learning management system
 * published by ILIAS open source e-Learning e.V.
 *
 * ILIAS is licensed with the GPL-3.0,
 * see https://www.gnu.org/licenses/gpl-3.0.en.html
 * You should have received a copy of said license along with the
 * source code, too.
 *
 * If this is not the case or you just want to try ILIAS, you'll find
 * us at:
 * https://www.ilias.de
 * https://github.com/ILIAS-eLearning
 *
 *********************************************************************/

declare(strict_types=1);

namespace ILIAS\Certificate\Table;

use Generator;
use ilCtrl;
use ilCtrlInterface;
use ilDateTime;
use ILIAS\Data\Order;
use ILIAS\Data\Range;
use ILIAS\UI\Component\Table\DataRetrieval;
use ILIAS\UI\Component\Table\DataRowBuilder;
use ILIAS\UI\Factory;
use ILIAS\UI\Implementation\Component\Input\Container\Filter\Standard;
use ILIAS\UI\Implementation\Component\Table\Table;
use ILIAS\UI\Renderer;
use ILIAS\UI\URLBuilder;
use ILIAS\UI\URLBuilderToken;
use ilLanguage;
use ilObjCertificateSettingsGUI;
use ilObject;
use ilObjUser;
use ilUIService;
use ilUserCertificate;
use ilUserCertificateRepository;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class CertificateOverviewTable
 * @author Marvin Beym <mbeym@databay.de>
 */
class CertificateOverviewTable implements DataRetrieval
{
    private ilUserCertificateRepository $repo;
    private ilUIService $ui_service;
    private Factory $ui_factory;
    private ilLanguage $lng;
    private ServerRequestInterface|RequestInterface $request;
    private \ILIAS\Data\Factory $data_factory;
    private ilCtrl|ilCtrlInterface $ctrl;
    private Standard $filter;
    private Table $table;
    private Renderer $ui_renderer;

    public function __construct(
        ?Factory $ui_factory = null,
        ?ilUserCertificateRepository $repo = null,
        ?ilUIService $ui_service = null,
        ?ilLanguage $lng = null,
        ServerRequestInterface|RequestInterface|null $request = null,
        ?\ILIAS\Data\Factory $data_factory = null,
        ?ilCtrl $ctrl = null,
        ?Renderer $ui_renderer = null
    ) {
        global $DIC;
        $this->ui_factory = $ui_factory ?: $DIC->ui()->factory();
        $this->repo = $repo ?: new ilUserCertificateRepository();
        $this->ui_service = $ui_service ?: $DIC->uiService();
        $this->lng = $lng ?: $DIC->language();
        $this->request = $request ?: $DIC->http()->request();
        $this->data_factory = $data_factory ?: new \ILIAS\Data\Factory();
        $this->ctrl = $ctrl ?: $DIC->ctrl();
        $this->ui_renderer = $ui_renderer ?: $DIC->ui()->renderer();

        $this->filter = $this->buildFilter();
        $this->table = $this->buildTable();
    }

    public function getRows(
        DataRowBuilder $row_builder,
        array $visible_column_ids,
        Range $range,
        Order $order,
        ?array $filter_data,
        ?array $additional_parameters
    ): Generator {
        $table_rows = $this->buildTableRows($this->repo->fetchCertificatesForOverview($range));
        [$order_field, $order_direction] = $order->join([], fn($ret, $key, $value) => [$key, $value]);

        $colum_to_order = array_column($table_rows, $order_field);
        array_multisort($colum_to_order, $order_direction === 'ASC' ? SORT_ASC : SORT_DESC, $table_rows);

        foreach ($this->filterTableRows($table_rows) as $row) {
            $row['issue_date'] = new ilDateTime($row['issue_date'], IL_CAL_UNIX);
            yield $row_builder->buildDataRow((string) $row['id'], $row);
        }
    }

    public function getTotalRowCount(?array $filter_data, ?array $additional_parameters): ?int
    {
        return count($this->filterTableRows($this->buildTableRows($this->repo->fetchCertificatesForOverview())));
    }

    protected function buildFilter(): Standard
    {
        return $this->ui_service->filter()->standard(
            'certificates_overview_filter',
            $this->ctrl->getLinkTargetByClass(
                ilObjCertificateSettingsGUI::class,
                ilObjCertificateSettingsGUI::CMD_CERTIFICATES_OVERVIEW
            ),
            [
                'certificate_id' => $this->ui_factory->input()->field()->text($this->lng->txt('certificate_id')),
                'issue_date' => $this->ui_factory->input()->field()->text($this->lng->txt('certificate_issue_date')),
                'object' => $this->ui_factory->input()->field()->text($this->lng->txt('obj')),
                'owner' => $this->ui_factory->input()->field()->text($this->lng->txt('owner')),
            ],
            [true, true, true, true],
            true,
            true
        );
    }

    protected function buildTable(): Table
    {
        $uiTable = $this->ui_factory->table();
        return $uiTable->data(
            $this->lng->txt('certificates'),
            [
                'certificate_id' => $uiTable->column()->text($this->lng->txt('certificate_id')),
                'issue_date' => $uiTable->column()->text($this->lng->txt('certificate_issue_date')), //ToDo: change to ->date()
                'object' => $uiTable->column()->text($this->lng->txt('obj')),
                'owner' => $uiTable->column()->text($this->lng->txt('owner')),
            ],
            $this
        )
            ->withRequest($this->request)
            ->withActions($this->buildTableActions());
    }

    protected function buildTableActions(): array
    {
        $uri_download = $this->data_factory->uri(
            ILIAS_HTTP_PATH . '/' . $this->ctrl->getLinkTargetByClass(
                ilObjCertificateSettingsGUI::class,
                ilObjCertificateSettingsGUI::CMD_DOWNLOAD_CERTIFICATE
            )
        );

        /**
         * @var URLBuilder $url_builder_download
         * @var URLBuilderToken $action_parameter_token_download ,
         * @var URLBuilderToken $row_id_token_download
         */
        [
            $url_builder_download,
            $action_parameter_token_download,
            $row_id_token_download
        ] =
            (new URLBuilder($uri_download))->acquireParameters(
                ['cert_overview'],
                'action',
                'id'
            );

        return [
            'download' => $this->ui_factory->table()->action()->single(
                $this->lng->txt('download'),
                $url_builder_download->withParameter($action_parameter_token_download, 'download'),
                $row_id_token_download
            )
        ];
    }

    /**
     * @param ilUserCertificate[] $certificates
     */
    protected function buildTableRows(array $certificates): array
    {
        $table_rows = [];

        foreach ($certificates as $certificate) {
            $table_rows[] = [
                'id' => $certificate->getId(),
                'certificate_id' => $certificate->getCertificateId(),
                'issue_date' => $certificate->getAcquiredTimestamp(),
                'object' => ilObject::_lookupTitle($certificate->getObjId()),
                'owner' => ilObjUser::_lookupLogin($certificate->getUserId()),
            ];
        }
        return $table_rows;
    }

    public function render(): string
    {
        return $this->ui_renderer->render([$this->filter, $this->table]);
    }

    protected function filterTableRows(array $table_rows): array
    {
        $filtered_table_rows = [];
        $filter_data = $this->ui_service->filter()->getData($this->filter) ?: [];

        foreach ($table_rows as $row) {
            foreach ($filter_data as $field_name => $filter_value) {
                if (!$filter_value) {
                    continue;
                }

                if (!str_contains((string) $row[$field_name], $filter_value)) {
                    continue 2;
                }
            }
            $filtered_table_rows[] = $row;
        }
        return $filtered_table_rows;
    }
}
