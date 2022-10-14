<?php
//Variável do tipo Array
$carros = array("Palio","Corsa","Gol","Uno");

//echo "<p>Modelo do carro: $carros[2]</p>";

//echo "Sistema operacional do usuário: ".$_SERVER["HTTP_SEC_CH_UA_PLATFORM"];
if(isset($_POST["nome"])){
    echo "Nome: ".$_POST["nome"]."<br>";
    echo "E-mail: ".$_POST["email"]."<br>";    
}

//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

?>
<style>
    body{background-color: green;}
</style>    
<form action="" method="post">
    Nome: <input type="text" name="nome"><br>
    E-mail<input type="email" name="email"><br>
    <input type="submit">
</form>    