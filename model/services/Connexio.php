<?php

class Connexio
{
    private $host;
    private $db;
    private $dsn;
    private $user;
    private $pass;
    public $connexio;

    public function __construct()
    {
        $this->host = 'mysql';
        $this->db = "protectora_animals";
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';';
        $this->user = 'paumas';
        $this->pass = "paumas";
    }

    public function openConnection()
    {
        try {
            $this->connexio = new PDO($this->dsn, $this->user, $this->pass);
            return $this->connexio;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
            return null;
        }
    }

    public function closeConnection()
    {
        try {
            $this->connexio = null;
            return $this->connexio;
        } catch (PDOException $ex) {
            echo "Error: " . $ex;
            return null;
        }
    }

    public function queryDataBase($sql, $params)
    {
        $this->openConnection();
        try {
            $this->statement = $this->connexio->prepare($sql);
            $this->statement->execute($params);
            $result = $this->statement;
            $this->closeConnection();
            return $result;
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
        $this->closeConnection();
        return null;
    }
}