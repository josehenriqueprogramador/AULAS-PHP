<?php
class Usuarios extends Sql
{
    private $dados;

    public function login($dados = array())
    {
        //Limpa os dados vindos do formulário
        $dados = array_map("strip_tags", $dados);
        $dados = array_map("trim", $dados);

        //Validando o e-mail
        if(!Check::campo("email", $dados["email"]))
        {
            $_SESSION["error"]["msg"] = "E-mail inválido ou incompleto. Tente novamente!";
            $_SESSION["error"]["type"] = WS_INFOR;
            return false;
        }

        // Dados limpos são armazenados para uso posterior
        $this->dados = $dados;

        $query = "SELECT * FROM tb_users WHERE email = :email AND senha = :senha";
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
            $_SESSION["error"]["msg"] = "E-mail ou senha inválida!";
            $_SESSION["error"]["type"] = WS_ERROR;
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

        $query = "SELECT * FROM tb_users";
        $result = $sql->select($query);

        return $result;
    }
    public function listUser(int $id)
    {
        $sql = new Sql();

        $query = "SELECT * FROM tb_users WHERE id=:id ";
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
        $query = "INSERT INTO tb_users (nome, email, senha) VALUES (:nome, :email, :senha);";
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
        $query = "UPDATE tb_users SET nome = :nome, email = :email, senha = :senha WHERE id = :id;";

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
        $query = "DELETE FROM tb_users WHERE id = :id;";
        if($sql->query($query, array(":id"=>$id)))
        {
            return true;
        }else{
            return false;
        }

    }

    private function enviaEmail($nome_user, $email_user, $mensagem){
        // Inicia a classe PHPMailer
        $mail = new PHPMailer();

        // Define os dados do servidor e tipo de conexão
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsSMTP(); // Define que a mensagem será SMTP
        $mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP
        $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
        $mail->Username = 'aulaprogramadorphp2019@gmail.com'; // Usuário do servidor SMTP
        $mail->Password = 'b007m004'; // Senha do servidor SMTP
        $mail->SMTPSecure = 'tls'; // Tipo de segurança
        $mail->Port = '587'; // Porta para envio autenticado

        // Define o remetente
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->From = "aulaprogramadorphp2019@gmail.com"; // Seu e-mail
        $mail->FromName = utf8_decode("Renove Soluções Prediais"); // Seu nome

        // Define os destinatário(s)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->AddAddress($email_user, $nome_user);
        //$mail->AddAddress('ciclano@site.net');
        //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
        //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

        // // Define os dados técnicos da Mensagem
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
        //$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
        // Define a mensagem (Texto e Assunto)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        $mail->Subject  = utf8_decode("Pedido de recuperação de senha"); // Assunto da mensagem
        //$mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>!  :)";
        $mail->Body = $mensagem;
        //$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";

        // // Define os anexos (opcional)
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
        //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

        // Envia o e-mail
        $enviado = $mail->Send();

        // Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        return $enviado;
    }
}