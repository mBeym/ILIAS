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


namespace ILIAS\Authentication\Login\Model;

use DateTime;
use ILIAS\Authentication\Login\UserId;

class UserAuthData
{
    public function __construct(
        private readonly UserId $user_id,
        private int             $login_attempts = 0,
        private ?DateTime       $last_login = null,
        private ?DateTime       $last_password_change = null
    )
    {
    }

    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    public function getLoginAttempts(): int
    {
        return $this->login_attempts;
    }

    public function setLoginAttempts(int $login_attempts): self
    {
        $this->login_attempts = $login_attempts;
        return $this;
    }

    public function getLastLogin(): ?DateTime
    {
        return $this->last_login;
    }

    public function getLastLoginTimestamp(): int
    {
        return $this->getLastLogin() !== null ? $this->getLastLogin()->getTimestamp() : 0;
    }

    public function setLastLogin(?DateTime $last_login): self
    {
        $this->last_login = $last_login;
        return $this;
    }

    public function getLastPasswordChange(): ?DateTime
    {
        return $this->last_password_change;
    }

    public function getLastPasswordChangeTimestamp(): int
    {
        return $this->getLastPasswordChange() !== null ? $this->getLastPasswordChange()->getTimestamp() : 0;
    }

    public function setLastPasswordChange(?DateTime $last_password_change): self
    {
        $this->last_password_change = $last_password_change;
        return $this;
    }
}
