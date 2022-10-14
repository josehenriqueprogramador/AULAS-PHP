<?php

include_once "config.php";


try{

    $pdo = new PDO(DNS, MYSQL_USER, MYSQL_PASSWORD);    
}
catch (PDOException $e){

    echo "Error: ".$e->getMessage();
}

// Consultando a tabela

$query = "SELECT * FROM usuarios WHERE id = :id";

$id = 3;

$result = $pdo->prepare($query);
$result->execute([

    ":id"=>$id
]);

$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $value){

    echo "Nome: {$value['nome']}"."<br>";
}