<?php

$carros = array(3=>"Gol", 2=>"Palio", 1=>"Fiesta");
// FUNÇÕES DE ARRAY 

// Adiciona um valor ao início do array
array_unshift($carros, "Chevette");
// Adiciona um valor ao final do array
array_push($carros, "Uno");

// Remove um valor do início do array
array_shift($carros);
// Remove um valor do final do array
array_pop($carros);

$a = array_pad($carros, 10, "Fusca");
$b = array_reverse($a, false);

$c = array_merge($a, $b);

$d = array_keys($carros);
$e = array_values($carros);

$f = array_slice($c, 0,3);

//echo "O array carros possui ".count($carros)." carros.";

if(in_array("Gol", $carros)){
   // echo "Tem Fusca na lista";
}else{
    //echo "Não tem Fusca na lista";
}

ksort($carros);
$lista = "Laranja, Banana, Maçã, Pera";
$frutas = explode(", ",$lista);

$carros_str = implode(", ",$carros);

echo $carros_str;
//print_r($frutas);
