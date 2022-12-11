<?php

namespace Classes;

use Config\Database;

abstract class Model
{
    protected ?Database $db;
    protected string $table;
    private $config;

    protected function __construct(string $table)
    {
        $this->config = require('config.php');
        $this->db = new Database($this->config['database']);
        $this->table = $table;
    }
}
