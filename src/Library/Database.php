<?php

namespace Library;

/**
 * Basic database wrapper (CRUD)
 *
 * @author David Lima
 */
class Database
{
    /**
     * @var \PDO
     */
    private static $connection;

    /**
     * @see Database::getConnection()
     */
    public function __construct()
    {
        self::getConnection();
    }

    /**
     * Perform a SQL INSERT query
     *
     * @param string $table Table to insert into
     * @param array $values Values to be inserted
     */
    public function insert($table, $values)
    {
        $columnsPlaceholder = [];

        foreach (array_keys($values) as $key) {
            $columnsPlaceholder[] = ":{$key}";
        }

        $columns = implode(',', array_keys($values));
        $columnsPlaceholder = implode(',', $columnsPlaceholder);

        $query = self::$connection->prepare("INSERT INTO {$table} ({$columns}) VALUES ($columnsPlaceholder)");

        foreach ($values as $column => $value) {
            $query->bindValue(":{$column}", $value);
        }

        $query->execute();
    }

    /**
     * Perform a SQL UPDATE query
     *
     * @param string $table Table to update
     * @param array $values Values to be updated
     * @param integer $id Register ID to update
     */
    public function update($table, $values, $id)
    {
        $sets = [];
        foreach (array_keys($values) as $key) {
            $sets[] = "{$key} = :{$key}";
        }

        $sets = implode(',', $sets);

        $query = self::$connection->prepare("UPDATE {$table} SET {$sets} WHERE id = :id LIMIT 1");

        foreach ($values as $key => $value) {
            $query->bindValue(":{$key}", $value);
        }

        $id = intval($id);
        $query->bindValue(':id', $id);

        $query->execute();
    }

    /**
     * Perform a SQL SELECT query
     *
     * @param string $from Table to select data
     * @param array $columns Columns to be selected
     * @param array|null $where WHERE clause
     * @param integer|null $limit LIMIT clause
     * @return array Array with all results
     */
    public function select($from, array $columns, array $where = null, $limit = null)
    {
        $columns = implode(',', $columns);

        if ($where) {
            $where = 'WHERE ' . implode(' AND ', $where);
        }

        if ($limit) {
            $limit = intval($limit);
            $limit = "LIMIT {$limit}";
        }

        $query = self::$connection->query("SELECT {$columns} FROM {$from} {$where} {$limit}");
        return $query->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Perform a SQL DELETE query
     *
     * @param string $from Table to delete data from
     * @param array $where WHERE clause
     * @param $limit LIMIT clause
     * @return int
     */
    public function delete($from, array $where, $limit)
    {
        if ($where) {
            $where = 'WHERE ' . implode('AND', $where);
        }

        if ($limit) {
            $limit = intval($limit);
            $limit = "LIMIT {$limit}";
        }

        $query = self::$connection->exec("DELETE FROM {$from} {$where} {$limit}");
        return $query;
    }


    /**
     * Generate a singleton database connection instance
     *
     * @return \PDO
     */
    private static function getConnection()
    {
        if (! self::$connection) {
            $accessData = require_once(__DIR__ . '/../Config/Database.php');

            $dsn = "{$accessData['driver']}:host={$accessData['host']};dbname={$accessData['dbname']}";

            $pdo = new \PDO($dsn, $accessData['username'], $accessData['password']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            self::$connection = $pdo;
        } else {
            return self::$connection;
        }
    }
}
