<?php

declare(strict_types=1);

namespace Pair\Support;

/**
 * @internal
 */
final readonly class Filesystem
{
    /**
     * Deletes a directory and all its contents recursively.
     */
    public static function remove(string $path): void
    {
        if (! is_dir($path)) {
            if (file_exists($path)) {
                unlink($path);
            }

            return;
        }

        $files = array_diff(scandir($path), ['.', '..']);

        foreach ($files as $file) {
            $fullPath = $path.DIRECTORY_SEPARATOR.$file;

            if (is_dir($fullPath)) {
                self::remove($fullPath);
            } else {
                unlink($fullPath);
            }
        }

        rmdir($path);
    }
}
