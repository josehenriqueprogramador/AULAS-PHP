<?php
require_once("../aula04/funcoes.php");

$tabuada = 5;

$fs = fopen("Tabuada de $tabuada.txt", "w");
fwrite($fs, tabuada(5));
fclose($fs);