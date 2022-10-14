<?php
include_once "config.php";

    if((isset($_GET["act"]))&&(!empty($_GET["act"])))
    {
        $dados = $_POST;

        if(!empty($dados)){
          $usuario = new Usuarios();
            if($usuario->updtUsuario($dados))
            {
                WSError("Dados alterados com sucesso!", WS_ACCEPT);
            }else{
                WSError("Erro ao gravar as alterações, tente novamente.", WS_INFOR);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="css/erros_php.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php
    $usuario = new Usuarios();
    
    if((!isset($_GET["id"]))&&(empty($_GET["id"])))
    {
        WSError("Nenhum usuário selecionado para alteração! <br><a href='painel.php'>Clique aqui para voltar ao painel</a>",WS_ERROR, true);
    }else{
        $id = trim(strip_tags($_GET["id"])) ;
        $result = $usuario->listUser($id);
        
        if(!$result){
            WSError("Nenhum usuário selecionado para alteração! <br><a href='painel.php'>Clique aqui para voltar ao painel</a>",WS_ERROR, true);
        }
    }
    

    ?>
    <h1>Alterar usuário</h1>
    <a href="painel.php" class="btn">Voltar para o Painel</a>
    <form action="?act=updt&id=<?=$result['id']?>" method="post">
        <fieldset>
            <input type="hidden" name="id" value="<?=$result['id']?>">
            <label>
                Nome:
                <span>
                    <input type="text" name="nome" maxlength="255" value="<?=$result['nome'];?>" required>
                </span>
            </label>
            <label>
                E-mail:
                <span>
                    <input type="email" name="email" maxlength="255" value="<?=$result['email'];?>" required>
                </span>
            </label>
            <label>
                Senha:
                <span>
                    <input type="password" name="pass" maxlength="8" value="<?=$result['senha'];?>" required>
                </span>
            </label>
            <input type="submit" value="GRAVAR">
        </fieldset>
    </form>
</body>
</html>