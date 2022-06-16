<?php

class MysqlBasicWrap
{
    private PDO $connection;
    private PDOStatement $statement;
    private array $result;

    public function __construct()
    {
        $this->connection = new PDO("mysql:host=" . Config::$MYSQL_ADDRESS . ":" . Config::$MYSQL_PORT . ";", Config::$MYSQL_USERNAME, Config::$MYSQL_PASSWORD);
        $this->connection->query('set names utf8');
    }

    public function prepare($sql): self
    {
        $this->statement = $this->connection->prepare($sql);
        return $this;
    }

    public function bind($key, $value): self
    {
        $this->statement->bindValue($key, $value);
        return $this;
    }

    /*
     * unsafe function for query. do not use if sql contains user input.
     * */
    public function query($sql): self
    {
        $this->connection->query($sql);
        return $this;
    }

    public function execute(): self
    {
        $this->statement->execute();
        return $this;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }


}