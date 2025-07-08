<?php

declare(strict_types=1);

namespace Pair\Contracts;

/**
 * @internal
 */
interface Agent
{
    /**
     * Returns the base folder for the agent.
     */
    public function baseFolder(): string;
}
