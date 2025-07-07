<?php

declare(strict_types=1);

namespace Pair\Console\Commands;

use Pair\AgentManager;
use Pair\Support\Project;
use Pair\Support\RulesGenerator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use function Termwind\renderUsing;

/**
 * @internal
 */
#[AsCommand(name: 'sync')]
final class SyncCommand extends Command
{
    /**
     * Executes the command.
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        renderUsing($output);

        $path = $input->getOption('path') ?: Project::fromEnv()->path();

        $this->ensureAgentsRulesAreSynced($path);

        return Command::SUCCESS;
    }

    /**
     * Configures the current command.
     */
    protected function configure(): void
    {
        $this
            ->addOption('path', null, InputOption::VALUE_REQUIRED, 'The path to the project')
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Force the installation, overwriting existing files');
    }

    /**
     * Ensures that the agents rules are synced in the specified path.
     */
    private function ensureAgentsRulesAreSynced(string $path): void
    {
        $agentManager = new AgentManager;

        foreach ($agentManager->all() as $agent) {
            RulesGenerator::generate($agent, $path);
        }
    }
}
