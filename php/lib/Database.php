<?php
namespace Database;

require 'config.php';
require 'lib/Medoo.php';
use Medoo\Medoo;

class Database
{

    private $database;

    public function connect()
    {
        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => DB_NAME,
            'server' => DB_SERVER,
            'username' => DB_USERNAME,
            'password' => DB_PASSWORD
        ]);
    }

    public function __construct()
    {}

    public function insert($table, $data)
    {
        try {
            $database->insert($table, $data);
        } catch (\Exception $e) {

            throw $e;
        }
    }
}

