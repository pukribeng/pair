<?php

declare(strict_types=1);

namespace Pair\Support;

use Pair\Contracts\Agent;

/**
 * @internal
 */
final readonly class RulesGenerator
{
    /**
     * Generates rules for the given agent.
     */
    public static function generate(Agent $agent, string $path): void
    {
        Filesystem::remove(
            $base = ($path.'/'.$agent->baseFolderOrFile()),
        );

        mkdir($base, 0755, true);

        $defaultsDir = dirname(__DIR__, 2).'/defaults';

        foreach (glob($defaultsDir.'/*.mdc') as $file) {
            copy($file, $base.'/'.basename($file));
        }
    }
}
