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
            $base = ($path.'/'.$agent->baseFolder()),
        );

        mkdir($base, 0755, true);

        $defaultsDir = dirname(__DIR__, 2).'/defaults';

        $files = glob($defaultsDir.'/*.mdr');

        if ($files === false) {
            return;
        }

        foreach ($files as $file) {
            copy($file, $base.'/'.basename($file));
        }
    }
}
