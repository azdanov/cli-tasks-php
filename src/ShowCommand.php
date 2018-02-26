<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ShowCommand.
 */
class ShowCommand extends Command
{
    /**
     * Configuration.
     */
    public function configure(): void
    {
        $this->setName('')
            ->setDescription('');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
    }
}
