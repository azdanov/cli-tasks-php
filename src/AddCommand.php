<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AddCommand.
 */
class AddCommand extends Command
{
    /**
     * Configuration for add.
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    public function configure(): void
    {
        $this->setName('add')
            ->setDescription('Add a new task')
            ->addArgument('description', InputArgument::REQUIRED);
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     *
     * @return int|void|null
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $description = $input->getArgument('description');

        $this->database->query(
            'INSERT INTO tasks(description) VALUES(:description)',
            compact('description')
        );

        $output->writeln('<info>Task Added!</info>');

        $this->showTasks($output);
    }
}
