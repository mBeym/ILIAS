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

use ILIAS\Forum\ForumDraftAccess;
use ILIAS\Forum\ThreadBelongsToForum;
use ILIAS\HTTP\Wrapper\WrapperFactory;
use ILIAS\Refinery\Factory;

/**
 * @ilCtrl_IsCalledBy ForumFileDeliveryGUI: ilObjForumGUI
 */
class ForumFileDeliveryGUI
{
    public const string CMD_DELIVER_FILE = 'deliverFile';
    public const string CMD_DELIVER_ZIP_FILE = 'deliverZipFile';
    public const string CMD_DELIVER_DRAFT_ZIP_FILE = 'deliverDraftZipFile';

    private ilCtrlInterface $ctrl;
    private ilAccessHandler $access;
    private ilLanguage $lng;
    private ?ilObjForum $object;
    private ilErrorHandling $error;
    private ForumDraftAccess $forum_draft_access;
    private int $draft_id;
    private ThreadBelongsToForum $forum_thread_belongs_to_forum;
    private ilForumPost $obj_current_post;
    private WrapperFactory $http_wrapper;
    private Factory $refinery;

    public function __construct(
        int                  $ref_id,
        int                  $draft_id,
        ilForumPost          $obj_current_post,
        ForumDraftAccess     $forum_draft_access,
        ThreadBelongsToForum $forum_thread_belongs_to_forum,
        ?ilCtrlInterface     $ctrl = null,
        ?ilAccessHandler     $access = null,
        ?ilLanguage          $lng = null,
        ?ilErrorHandling     $error = null,
        ?WrapperFactory      $http_wrapper = null,
        ?Factory             $refinery = null
    )
    {
        global $DIC;
        $this->draft_id = $draft_id;
        $this->forum_draft_access = $forum_draft_access;
        $this->forum_thread_belongs_to_forum = $forum_thread_belongs_to_forum;
        $this->obj_current_post = $obj_current_post;
        $this->object = ilObjectFactory::getInstanceByRefId($ref_id);
        $this->ctrl = $ctrl ?? $DIC->ctrl();
        $this->access = $access ?? $DIC->access();
        $this->lng = $lng ?? $DIC->language();
        $this->error = $error ?? $DIC['ilErr'];
        $this->http_wrapper = $http_wrapper ?? $DIC->http()->wrapper();
        $this->refinery = $refinery ?? $DIC->refinery();
    }

    public function executeCommand(): void
    {
        $cmd = $this->ctrl->getCmd();
        if (!method_exists($this, $cmd) || !(new ReflectionMethod($this, $cmd))->isPublic()) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }
        $this->$cmd();
    }

    public function deliverFile(): void
    {
        $file_obj_for_delivery = new ilFileDataForum($this->object->getId(), $this->obj_current_post->getId());
        if ($this->draft_id > 0 && ilForumPostDraft::isSavePostDraftAllowed()) {
            $file_obj_for_delivery = new ilFileDataForumDrafts($this->object->getId(), $this->draft_id);
        }
        $file = $this->http_wrapper->query()->retrieve(
            'file',
            $this->refinery->kindlyTo()->string()
        );
        $file_obj_for_delivery->deliverFile($file);
    }

    public function deliverZipFile(): void
    {
        if (!$this->access->checkAccess('read', '', $this->object->getRefId())) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }

        $this->forum_thread_belongs_to_forum->ensureThreadBelongsToForum(
            $this->object->getId(),
            $this->obj_current_post->getThread()
        );

        $fileData = new ilFileDataForum($this->object->getId(), $this->obj_current_post->getId());
        if (!$fileData->deliverZipFile()) {
            $this->ctrl->redirect($this);
        }
    }

    public function deliverDraftZipFile(): void
    {
        if (!$this->access->checkAccess('read', '', $this->object->getRefId())) {
            $this->error->raiseError($this->lng->txt('permission_denied'), $this->error->MESSAGE);
        }

        $draft = ilForumPostDraft::newInstanceByDraftId($this->draft_id);
        $this->forum_draft_access->checkDraftAccess($draft);
        $fileData = new ilFileDataForumDrafts(0, $draft->getDraftId());
        if (!$fileData->deliverZipFile()) {
            $this->ctrl->redirectByClass(ilObjForumGUI::class);
        }
    }
}
