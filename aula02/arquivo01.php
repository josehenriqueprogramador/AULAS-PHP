<?php

$carro = "Fiat ";

$carro .= "Palio ";

/**
 * Exemplo de variável do tipo booleano
 * Só pode receber True (Verdadeiro) ou False (Falso)
 */

$exibir_cor = FALSE;

//Exemplos que retornam falso em uma comparção booleana
$numero = 0.0;
$texto = "";
$texto = "0";
$texto = NULL; 

if($exibir_cor){
    $carro .= "vermelho ";
}

$valor = 15000;
$valor += 5000;

echo "<pre>";
var_dump($carro, $valor);
echo "</pre>";