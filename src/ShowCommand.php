<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ShowCommand.
 */
class ShowCommand extends Command
{
    /**
     * Configuration for show.
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    public function configure(): void
    {
        $this->setName('show')
            ->setDescription('Show all tasks');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $this->showTasks($output);
    }
}
