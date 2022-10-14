<?php

// Manipulação de strings

// Concatenação de strings

// 1 - Usando " " 

$nome = "Bruno";
$sobrenome = "Marques";
echo "Usando a concatenação da variável \$nome onde seu valor é \"$nome\"<br>";
echo "Nome completo: ".$nome." ".$sobrenome."<br>";

echo "Nome \t Sobrenome <br>";

// Funções de manipulação de strings

// Converter Maiúscula / Minuscula
$texto = "Esse texto foi convertido para maiúscula<br>";

echo strtoupper($texto);
echo strtolower("Esse texto foi convertido para minúscula<br>");

// Cortar uma string
echo substr($texto, 10, 20)."<br>";

// Contar quantos caracteres uma string possui
echo "A frase possui ".strlen($texto)." caracteres<br>";

// Encontra a primeira ocorrencia de uma string dentro de outra.

$procurar = "foi";

echo strpos($texto, $procurar);