<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

/**
 * Class ilMailAppEventListener
 * @author Marvin Beym <mbeym@databay.de>
 */
class ilMailAppEventListener implements ilAppEventListener
{

    /**
     * @inheritDoc
     */
    public static function handleEvent($a_component, $a_event, $a_parameter) : void
    {
        if ($a_component === "Services/User" && $a_event === "onUserFieldAttributesChanged") {
            global $DIC;
            $db = $DIC->database();
            $changedFields = $a_parameter;
            if (isset($changedFields["visible_second_email"]) && !(bool) $changedFields["visible_second_email"]["new"]) {
                $result = $db->query("SELECT value FROM settings WHERE module = 'common' AND keyword = 'mail_address_option'");
                $generalIncomingMailSetting = (int) ($db->fetchAssoc($result)["value"] ?? 3);

                switch ($generalIncomingMailSetting) {
                    case ilMailOptions::SECOND_EMAIL:
                    case ilMailOptions::BOTH_EMAIL:
                        $db->manipulate(
                            "UPDATE settings SET value = 3 WHERE module = 'common' AND keyword = 'mail_address_option'"
                        );
                        $db->manipulate("UPDATE mail_options SET mail_address_option = 3");
                        break;
                }
            }
        }
    }
}