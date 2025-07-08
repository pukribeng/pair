<?php

use Symfony\Component\Process\Process;

it('creates the `.ai` folder', function () {
    $process = Process::fromShellCommandline(
        'php ./bin/pair install --path tests/Playground',
    );

    $exitCode = $process->run();

    expect($exitCode)->toBe(0);

    $aiDirectory = dirname(__DIR__, 2).'/Playground/.ai';

    expect($aiDirectory)->toBeDirectory()
        ->and($aiDirectory.'/01_general.mdc')->toBeFile();
});
