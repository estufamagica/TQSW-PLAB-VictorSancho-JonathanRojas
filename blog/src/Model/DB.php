<?php

namespace Jonap\TqswPlabVictorSanchoJonathanRojas\src\Model;

class DB
{
    private $host = 'localhost';
    private $dbname = 'blog_videojuegos';
    private $port = 8001;
    private $charset = 'UTF8mb4';
    private $username = 'user';
    private $password = 'user';

    public function connect()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port;charset=$this->charset";
        $DBH = new PDO($this->dsn, $this->username, $this->password);
        $DBH->exec("set names utf8");
        $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $DBH;
    }
}
