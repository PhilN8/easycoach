<?php

namespace Config;

use PDO, PDOException;
use PDOStatement;

class Database
{
    // private $host = 'localhost';
    // private $db_name = 'easycoach';
    // private $username = 'root';
    // private $password = "";

    // public function connect()
    // {
    //     $this->conn = null;

    //     try {
    //         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         echo "Connection Error: " . $e->getMessage();
    //         exit();
    //     }

    //     return $this->conn;
    // }

    private ?PDO $conn;
    private ?PDOStatement $stmt;

    public function __construct($config, $username = 'root', $password = '')
    {
        $this->conn = null;
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            ]);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            exit();
        }
    }

    public function query($query, $params = [])
    {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function all()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function check(): bool
    {
        $result = $this->find();

        return $result === FALSE ? false : true;
    }

    // public function search($query, $params = [])
    // {
    //     $this->query($query, $params);

    //     return $this->stmt->fetch() === FALSE ? false : true;
    // }

    public function get()
    {
        return $this->stmt->fetch();
    }

    public function upsert($query, $params = [], bool $returnItem = false): int
    {
        $this->query($query, $params);
        return $returnItem ? $this->conn->lastInsertId() : $this->stmt->rowCount();
    }
}
