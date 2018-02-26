<?php

declare(strict_types=1);

namespace Task;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Command with injected database adapter.
 */
class Command extends SymfonyCommand
{
    /**
     * @var DatabaseAdapter
     */
    protected $database;

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
     * @param OutputInterface $output
     */
    protected function showTasks(OutputInterface $output): void
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
