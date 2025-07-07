<?php

declare(strict_types=1);

namespace Pair\Support;

/**
 * @internal
 */
final readonly class Project
{
    /**
     * Creates a new project instance.
     */
    public function __construct(
        private string $path,
    ) {
        //
    }

    /**
     * Creates a new project instance from the current working directory.
     */
    public static function fromEnv(): self
    {
        return new self(getcwd());
    }

    /**
     * Returns the path to the project.
     */
    public function path(): string
    {
        return $this->path;
    }
}
