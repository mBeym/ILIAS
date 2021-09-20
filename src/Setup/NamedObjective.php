<?php declare(strict_types=1);
/* Copyright (c) 1998-2020 ILIAS open source, Extended GPL, see docs/LICENSE */

namespace ILIAS\Setup;

use Closure;

/**
 * Class NamedObjective
 * @package ILIAS\Setup
 * @author  Marvin Beym <mbeym@databay.de>
 */
class NamedObjective
{
    private string $cmd;
    private string $description;

    private Closure $objectiveCollectionClosure;

    public function __construct(string $cmd, string $description, Closure $objectiveCollectionClosure)
    {
        $this->cmd = $cmd;
        $this->description = $description;
        $this->objectiveCollectionClosure = $objectiveCollectionClosure;
    }

    /**
     * @return string
     */
    public function getCmd() : string
    {
        return $this->cmd;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @return Closure
     */
    public function getObjectiveCollectionClosure() : Closure
    {
        return $this->objectiveCollectionClosure;
    }
}