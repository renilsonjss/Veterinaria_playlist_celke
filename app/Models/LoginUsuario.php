<?php

namespace App\Models;

use PDO;

class LoginUsuario extends Conn
{
    private $dados;
    private bool $resultado;
    private object $conn;
    private $resultadoBd;

    function getResultado(): bool
    {
        return $this->resultado;
    }

    public function login(array $dados = null)
    {
        $this->dados = $dados;
        var_dump($this->dados);

        $this->conn = $this->connect();

        $query_validar_login = "SELECT id, nome, email, senha FROM usuarios WHERE email =:email LIMIT 1";
        $resul_val_login = $this->conn->prepare($query_validar_login);
        $resul_val_login->bindParam(":email", $this->dados['email'], PDO::PARAM_STR);
        $resul_val_login->execute();
        
        $this->resultadoBd = $resul_val_login->fetch();
        var_dump($this->resultadoBd);
        
        if($this->resultadoBd)
        {
            echo "Encontrou o usuário!";
            $this->resultado = true;
        }
        else
        {
            echo "Erro: Usuário não encontrado!";
            $this->resultado = false;
        }
    }
}

?>