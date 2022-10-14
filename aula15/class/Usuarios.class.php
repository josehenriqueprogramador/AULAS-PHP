<?php

class Usuarios extends Sql
{
    private $dados;

    public function login($dados = array()){

        // Limpa os dados vindos do formulário
        $dados = array_map("strip_tags", $dados);
        $this->dados = array_map("trim", $dados);

        // Dados limpos são armazenados para uso posterior
        $this->dados = $dados;

        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = new Sql();

        $result = $sql->select($query, array(

            ':email' => $this->dados['email'],
            ':senha' => $this->dados['senha'],
        ));

        if(count($result) > 0){
            
            $_SESSION["usr"] = $result[0];

            return true;
        }
        else {

            return false;
        }
    }
}