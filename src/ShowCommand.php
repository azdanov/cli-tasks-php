<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ShowCommand.
 */
class ShowCommand extends Command
{
    /**
     * @var DatabaseAdapter
     */
    private $database;

    /**
     * ShowCommand constructor.
     *
     * @param DatabaseAdapter $database
     *
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(DatabaseAdapter $database)
    {
        $this->database = $database;
        parent::__construct();
    }

    /**
     * Configuration.
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

    /**
     * @param OutputInterface $output
     */
    private function showTasks(OutputInterface $output): void
    {
        if (!$tasks = $this->database->fetchAll('tasks')) {
            $output->writeln('<info>No tasks at the moment</info>');

            return;
        }

        $table = new Table($output);

        $table->setHeaders(['Id', 'Description'])
            ->setRows($tasks)
            ->render();
    }
}
