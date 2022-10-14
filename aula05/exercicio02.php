<?php
require_once("../aula04/funcoes.php");
$tabuada = 5;
file_put_contents("Tabuada de $tabuada.txt", tabuada(5));
echo file_get_contents("Tabuada de $tabuada.txt");