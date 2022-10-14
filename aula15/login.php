<?php

include_once "config.php";


if(isset($_POST) && !empty($_POST)){

    $dados = $_POST;

    $usr = new Usuarios();

    if($usr->login($dados)){

        WSError("Olá ".$_SESSION['usr']['nome']." seja bem-vindo!", WS_ACCEPT);
        header("location:painel.php");
    }
    else {
        WSError("Usuario ou senha inválida!", WS_ALERT);
    }

    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/erros_php.css">

    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        form span {display: block;}

        html, body { height: 100%; }
        .container { height: 100%; display: flex; }


    </style>
</head>
<body>
    <div class="container">
        <div>
            <form action="#" method="post">
                <label>email: </label>
                <input type="email" name="email" required>
                <br>
                <br>
                <label>senha: </label>
                <input type="password" name="senha" maxlength="8" required>
                <br>
                <input type="submit" value="enviar">
            </form>
        </div>
    </div>
</body>
</html>