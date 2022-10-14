<?php

class Usuarios extends Sql
{
    private $dados;

    public function login($dados = array())
    {
        //Limpa os dados vindos do formulário
        $dados = array_map("strip_tags", $dados);
        $dados = array_map("trim", $dados);

        // Dados limpos são armazenados para uso posterior
        $this->dados = $dados;

        $query = "SELECT * FROM users WHERE email = :email AND senha = :senha";
        $sql = new Sql();
        $result = $sql->select($query, array(
            ':email' => $this->dados['email'],
            ':senha' => $this->dados['senha']
        ));

        if(count($result)>0)
        {
            $_SESSION["usr"] = $result[0];
            return true;
        }else{
            return false;
        }

    }
    public function logout()
    {
        unset($_SESSION['usr']);
        
    }

    public function listar()
    {
        $sql = new Sql();

        $query = "SELECT * FROM users";
        $result = $sql->select($query);

        return $result;
    }
    public function listUser(int $id)
    {
        $sql = new Sql();

        $query = "SELECT * FROM users WHERE id=:id ";
        $result = $sql->select($query, array(
            ":id"=>$id
        ));
        if(count($result)>0){
            return $result[0];
        }else{
            return false;
        }
    }

    public function addUsuario(array $dados)
    {
        $dados = array_map("strip_tags", $dados);
        $dados = array_map("trim", $dados);

        $sql = new Sql();
        $query = "INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha);";
        $sql->query($query, array(
            ":nome" => $dados["nome"],
            ":email" => $dados["email"],
            ":senha" => $dados["pass"]
        ));

        return true;
    }

    public function updtUsuario(array $dados)
    {
        $dados = array_map("strip_tags", $dados);
        $dados = array_map("trim", $dados);

        $sql = new Sql();
        $query = "UPDATE users SET nome = :nome, email = :email, senha = :senha WHERE id = :id;";

        $sql->query($query, array(
            ":nome" => $dados["nome"],
            ":email" => $dados["email"],
            ":senha" => $dados["pass"],
            ":id" => $dados["id"]
        ));

        return true;
    }

    /**
     * A Função delUsuario exclui o usuário informando o ID
     * 
     * @return bool;
     */

    public function delUsuario(int $id):bool
    {
        $sql = new Sql();
        $query = "DELETE FROM users WHERE id = :id;";
        if($sql->query($query, array(":id"=>$id)))
        {
            return true;
        }else{
            return false;
        }

    }
}