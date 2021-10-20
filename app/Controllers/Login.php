<?php

namespace App\Controllers;

class Login
{
    private $dados;

    public function index()
    {
        $this->dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        var_dump($this->dados);

        if(!empty($this->dados['logar']))
        {
            $visualizarLogin = new \App\Models\LoginUsuario();
            $visualizarLogin->login($this->dados);
            if($visualizarLogin->getResultado())
            {
                echo "Usuário logado!<br>";
            }
            else
            {
                echo "Dados inválidos!<br>";
            }
        }

        $carregarView = new \Core\ConfigView("Views/login/login", $this->dados);
        $carregarView->renderizar();
    }
}

?>