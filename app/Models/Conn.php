<?php

namespace App\Models;

use PDO;

class Conn
{
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "sistema_veterinario";
    public object $connect;
    
    protected function connect() {
        try 
        {
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            return $this->connect;
        }
        catch (Exception $ex) {
            die('Erro: Por favor tente novamente. Caso o problema persista, entre em contato o administrador adm@empresa.com');
        }
    }
}
