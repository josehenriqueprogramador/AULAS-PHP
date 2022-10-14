<?php
include_once "config.php";

if((isset($_POST)) && (!empty($_POST))){
    
    $dados = $_POST;

    $usr = new Usuarios;

    if($usr->login($dados))
    {
        WSError("Olá ".$_SESSION['usr']['nome']." seja bem-vindo!",WS_ACCEPT);
        header("location:painel.php");
    }else{
        WSError("Usuário ou senha inválida!", WS_ALERT);
    }
    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/erros_php.css">
    <style>
        *{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        html, body{ height: 100%;}
        .container{height: 100%; display: flex; justify-content: center; align-items: center;}
        form fieldset{background-color: #e3e3e3;}
        form span{display: block; margin-bottom: 10px;}
        form label{width: 50px; display: inline-block;}
    </style>
</head>
<body>
    <div class="container">
        <div>
            <form action="#" method="post">
                <fieldset>
                <span>
                    <label>E-mail: </label>
                    <input type="email" name="email" required>
                </span>
                <span>
                    <label>Senha: </label>
                    <input type="password" name="senha" maxlength="8" required>
                </span>
                <input type="submit" value="ENTRAR">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>