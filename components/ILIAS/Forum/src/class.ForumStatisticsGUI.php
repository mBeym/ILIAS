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

use ILIAS\Forum\Statistics\ForumStatisticsTable;
use ILIAS\UI\Factory;
use ILIAS\UI\Renderer;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @ilCtrl_IsCalledBy ForumStatisticsGUI: ilObjForumGUI
 */
class ForumStatisticsGUI
{
    public const string CMD_SHOW = 'showStatistics';
    private ilCtrlInterface $ctrl;
    private ilSetting $settings;
    private ilAccessHandler $access;
    private ilLanguage $lng;
    private ilObjectDataCache $obj_data_cache;
    private ilForumProperties $obj_properties;
    private ?ilObjForum $object;
    private ilErrorHandling $error;
    private ilGlobalTemplateInterface $main_tpl;
    private ilObjUser $user;
    private Factory $ui_factory;
    private Renderer $ui_renderer;
    private ServerRequestInterface $request;

    public function __construct(
        int                        $ref_id,
        ?ilCtrlInterface           $ctrl = null,
        ?ilSetting                 $settings = null,
        ?ilAccessHandler           $access = null,
        ?ilLanguage                $lng = null,
        ?ilObjectDataCache         $obj_data_cache = null,
        ?ilErrorHandling           $error = null,
        ?ilGlobalTemplateInterface $main_tpl = null,
        ?ilObjUser                 $user = null,
        ?Factory                   $ui_factory = null,
        ?Renderer                  $ui_renderer = null,
        ?ServerRequestInterface    $request = null,
    )
    {
        global $DIC;
        $this->object = ilObjectFactory::getInstanceByRefId($ref_id);
        $this->ctrl = $ctrl ?? $DIC->ctrl();
        $this->settings = $settings ?? $DIC->settings();
        $this->access = $access ?? $DIC->access();
        $this->lng = $lng ?? $DIC->language();
        $this->obj_data_cache = $obj_data_cache ?? $DIC['ilObjDataCache'];
        $this->obj_properties = ilForumProperties::getInstance($this->obj_data_cache->lookupObjId($ref_id));
        $this->error = $error ?? $DIC['ilErr'];
        $this->main_tpl = $main_tpl ?? $DIC->ui()->mainTemplate();
        $this->user = $user ?? $DIC->user();
        $this->ui_factory = $ui_factory ?? $DIC->ui()->factory();
        $this->ui_renderer = $ui_renderer ?? $DIC->ui()->renderer();
        $this->request = $request ?? $DIC->http()->request();

    }

    public function executeCommand(): void
    {
        $cmd = $this->ctrl->getCmd();
        if (!method_exists($this, $cmd) || !(new ReflectionMethod($this, $cmd))->isPublic()) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }
        $this->$cmd();
    }

    public function showStatistics(): void
    {
        if (!$this->settings->get('enable_fora_statistics', '0')) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }

        if (!$this->access->checkAccess('read', '', $this->object->getRefId())) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }

        if (!$this->obj_properties->isStatisticEnabled()) {
            if ($this->access->checkAccess('write', '', $this->object->getRefId())) {
                $this->main_tpl->setOnScreenMessage('info', $this->lng->txt('frm_statistics_disabled_for_participants'));
            } else {
                $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
            }
        }

        $this->object->Forum->setForumId($this->object->getId());

        $tbl = new ForumStatisticsTable(
            $this->object,
            $this->obj_properties,
            ilLearningProgressAccess::checkAccess($this->object->getRefId()),
            $this->access->checkRbacOrPositionPermissionAccess(
                'read_learning_progress',
                'read_learning_progress',
                $this->object->getRefId()
            ),
            $this->user,
            $this->ui_factory,
            $this->request,
            $this->lng
        );
        $this->main_tpl->setContent($this->ui_renderer->render($tbl->getComponent()));
    }
}
