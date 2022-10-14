<?php
//Criando a conexão com o banco de dados
$conn = mysqli_connect('localhost','alunophp','alunophp','aulasphp');

//Define a consulta que será realizada
if((isset($_GET['act'])) && (!empty($_GET['act']))){
    
    $act = $_GET['act'];

    switch ($act) {
        case 'insert':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $query = "INSERT INTO contatos (nome, email, telefone) VALUES ('$nome','$email','$telefone')";
            mysqli_query($conn, $query);
            break;

        case 'delete':
            $id = $_GET['id'];
            $query = "DELETE FROM contatos WHERE id = $id";
            mysqli_query($conn, $query);
            break;

        case 'update':
            $id = $_GET['id'];
            $query = "SELECT * from contatos WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            
            break;
        case 'gravar':
            
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];

            $query = "UPDATE contatos SET nome = '$nome', email= '$email', telefone='$telefone'  WHERE id = $id";
            mysqli_query($conn, $query);
            // Após a alteração dos dados redireciona novamente para a página mysql_lista.php
            header("location: mysql_lista.php");

            break;
    }
}

$query = "SELECT * from contatos";

//Envia a consulta para o BD
$result = mysqli_query($conn, $query);


if((isset($act)) && ($act == 'update')) {
    $form = 'mysql_lista.php?act=gravar';
}else{
    $form = 'mysql_lista.php?act=insert';
}


echo "
<form action='$form' method='post'>
    <fieldset>
        <input type='hidden' name='id' ".(isset($row['id']) ?"value=".$row['id']:'').">
        <label>Nome:</label>
        <input type='text' name='nome' placeholder='Digite o nome...' ".(isset($row['nome']) ?"value='".$row['nome']."'":'')." required><br>
        <label>E-mail</label>
        <input type='email' name='email' placeholder='Digite o e-mail...' ".(isset($row['email']) ?"value='".$row['email']."'":'')." required><br>
        <label>Telefone (opicional)</label>
        <input type='text' name='telefone' placeholder='Informe o telefone...' ".(isset($row['telefone']) ?"value='".$row['telefone']."'":'')."><br>
        <input type='submit' ".(isset($_GET['id']) ?"value='Alterar'":"value='Adicionar'").">
    </fieldset>
</form>
";

if($result)
{
    //percorra o resultado da pesquisa
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['id']." - ". $row["nome"]. "(".$row["email"].") 
        [ <a href='mysql_lista.php?act=update&id=".$row['id']."'>Alterar</a> / 
        <a href='mysql_lista.php?act=delete&id=".$row['id']."'>Excluir</a> ]<br>";
        //echo "{$row['id']} - {$row['nome']} ({$row['email']})";
    }
}
//fecha a conexao
mysqli_close($conn);
