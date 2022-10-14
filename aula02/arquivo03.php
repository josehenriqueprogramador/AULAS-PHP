<?php

//Constantes
define("MAXIMO_CLIENTES",100);

//echo MAXIMO_CLIENTES;

//OPERADORES DE ATRIBUIÇÃO
$var = 100;
$var += 5; // 105
$var -= 5; // 100
$var *= 5; // 500
$var /= 5; // 100

echo $var."<br>";

++$var; // Pré-incremento
$var++; // Pós-incremento
--$var;
$var--;

//OPERADORES RELACIONAIS
$a = 5;
$b = "5";
if ($a != $b){
    // echo "Verdadeiro";
}else{
    // echo "Falso";
}

//OPERADORES LÓGICOS

// AND (&&) as duas condições tem que ser verdadeiras

/**
 *  V V = V
 *  V F = F
 *  F V = F
 *  F F = F
 */

// OR (||) basta que uma condição seja V para retornar verdadeiro

/**
 *  V V = V
 *  V F = V
 *  F V = V
 *  F F = F
 */


if (($a === 5) OR ($b === 5)){
    echo "Verdadeiro";
}else{
    echo "Falso";
} 