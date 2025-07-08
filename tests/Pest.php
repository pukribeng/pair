<?php

declare(strict_types=1);

use Pair\Support\Filesystem;

pest()->beforeEach(function (): void {
    Filesystem::remove(
        dirname(__DIR__, 2).'/Playground/.ai',
    );
});
