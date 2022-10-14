<link rel="stylesheet" href="css/erros_php.css">
<?php
include_once "config.php";

$conn = new Sql();

$sql = "SELECT * FROM usuarios WHERE id = :id";

$resultado = $conn->select($sql, array(
    
    ':id' => 2 ));

echo "<pre>";
var_dump($resultado);
echo "</pre>";