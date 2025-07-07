<?php

declare(strict_types=1);

namespace Pair\Agents;

use Pair\Contracts\Agent;

/**
 * @internal
 */
final class Junie implements Agent
{
    /**
     * Returns the base folder or file for the agent.
     */
    public function baseFolderOrFile(): string
    {
        return '.junie';
    }
}
