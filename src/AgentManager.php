<?php

declare(strict_types=1);

namespace Pair;

use Pair\Agents\Cline;
use Pair\Agents\Cursor;
use Pair\Agents\Junie;
use Pair\Agents\Windsurf;
use Pair\Contracts\Agent;

/**
 * @internal
 */
final readonly class AgentManager
{
    /**
     * Creates a new instance of the agent manager.
     *
     * @param  array<string, class-string<Agent>>  $agents
     */
    public function __construct(
        private array $agents = [
            Cursor::class,
            Windsurf::class,
            Junie::class,
            Cline::class,
        ]
    ) {
        //
    }

    /**
     * Returns all the agents.
     *
     * @return array<string, Agent>
     */
    public function all(): array
    {
        return array_map(
            static fn (string $agentClass): Agent => new $agentClass,
            $this->agents
        );
    }
}
