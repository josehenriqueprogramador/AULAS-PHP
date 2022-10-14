<?php
include_once "config.php";

    if((isset($_GET["act"]))&&(!empty($_GET["act"])))
    {
        $dados = $_POST;

        $usuario = new Usuarios();
        if($usuario->addUsuario($dados))
        {
            WSError("<b>Usuario:</b> {$dados['nome']}, cadastrado com sucesso!", WS_ACCEPT);
        }else{
            WSError("Erro ao adicionar o usuário, tente novamente.", WS_INFOR);
        } 
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Novo Usuário</title>
    <link rel="stylesheet" href="css/erros_php.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Cadastrar novo usuário</h1>
    <a href="painel.php" class="btn">Voltar para o Painel</a>
    <form action="?act=add" method="post">
        <fieldset>
            <label>
                Nome:
                <span>
                    <input type="text" name="nome" maxlength="255" required>
                </span>
            </label>
            <label>
                E-mail:
                <span>
                    <input type="email" name="email" maxlength="255" required>
                </span>
            </label>
            <label>
                Senha:
                <span>
                    <input type="password" name="pass" maxlength="8" required>
                </span>
            </label>
            <input type="submit" value="GRAVAR">
        </fieldset>
    </form>
</body>
</html>