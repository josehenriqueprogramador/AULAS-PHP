<?php
include_once "config.php";
//checkLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <h1>Painel de controle - </h1>
  <a href="new_user.php" class="btn">Novo usuário</a>
  <table width=100%;>
    <tr>
      <th width=5% align="left">Id</th>
      <th width=40% align="left">Nome</th>
      <th width=40% align="left">Email</th>
      <th width=15% class="txt_center">Ações</th>
    </tr>
    <?php
    //Lista os usuários cadastrados
    $usuarios = new Usuarios;
    $rows = $usuarios->listar();
    
    foreach($rows as $value){

      // echo "
      // <tr>
      //   <td>{$value["id"]}</td>
      //   <td>{$value["nome"]}</td>
      //   <td>{$value["email"]}</td>
      //   <td class='txt_center'><a href='updt_user.php' class='btn'>Alterar</a> <a href='del_user.php' class='btn'>Excluir</a></td>
      // </tr>
      // ";

    ?>
    <tr>
      <td><?=$value["id"];?></td>
      <td><?=$value["nome"];?></td>
      <td><?=$value["email"];?></td>
      <td class="txt_center"><a href="updt_user.php?id=<?=$value["id"];?>" class="btn">Alterar</a> <a href="del_user.php?id=<?=$value["id"];?>" class="btn">Excluir</a></td>
    </tr>
    <?php
    }
    ?>   
  </table>
</body>
</html>