<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function compact;

/**
 * Class CompleteCommand.
 */
class CompleteCommand extends Command
{
    /**
     * Configuration for complete.
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    public function configure(): void
    {
        $this->setName('complete')
            ->setDescription('complete a task by its id')
            ->addArgument('id', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    public function execute(InputInterface $input, OutputInterface $output): void
    {
        $id = $input->getArgument('id');

        $this->database->query(
            'DELETE FROM tasks WHERE id = :id',
            compact('id')
        );

        $output->writeln('<info>Task Completed!</info>');

        $this->showTasks($output);
    }
}
