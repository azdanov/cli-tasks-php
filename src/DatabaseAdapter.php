<?php

declare(strict_types=1);

namespace Task;

/**
 * Generic Database Adapter for usage with CLI Task application.
 */
class DatabaseAdapter
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * DatabaseAdapter constructor.
     *
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $tableName
     *
     * @return array
     */
    public function fetchAll(string $tableName): array
    {
        return $this->connection
            ->query("SELECT * FROM $tableName")
            ->fetchAll();
    }

    /**
     * @param string $sql
     * @param array  $parameters
     *
     * @return bool
     */
    public function query(string $sql, array $parameters): bool
    {
        return $this->connection
            ->prepare($sql)
            ->execute($parameters);
    }
}
