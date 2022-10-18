<?php
    include_once "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir usuário</title>
    <link rel="stylesheet" href="css/erros_php.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php
        if((isset($_GET["id"])) && (!empty($_GET["id"])))
        {
            $id = trim(strip_tags($_GET["id"]));
            
            $usuario = new Usuarios();
            if($usuario->delUsuario($id))
            {
                WSError("Usuário excluido com sucesso! <br><a href='painel.php'>Clique aqui para voltar ao painel</a>",WS_INFOR);
            }else{
                WSError("Erro ao excluir o usuário, tente novamente. <br><a href='painel.php'>Clique aqui para voltar ao painel</a>",WS_ALERT);
            }
        }
    ?>
    <script>
        setTimeout(()=>{
            location.href = 'painel.php'; 
        }, 5000);
    </script>
</body>
</html>