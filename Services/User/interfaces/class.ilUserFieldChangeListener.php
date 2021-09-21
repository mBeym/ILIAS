<?php declare(strict_types=1);

/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace ILIAS\Services\User;

use ILIAS\DI\Container;

abstract class ilUserFieldChangeListener
{
    protected Container $dic;

    public function __construct(Container $dic) {
        $this->dic = $dic;
    }

    /**
     * Should return a description for a user profile field.
     * Returning null or an empty string will skip the listener
     * @param string $fieldName
     * @return string|null
     */
    abstract public function getDescriptionForField(string $fieldName) : ?string;

    /**
     * Should return the component name like it would be used to raise an event
     * @example "Services/Mail"
     * @return string
     */
    abstract public function getComponentName() : string;
}