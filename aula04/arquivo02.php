<?php
/* Inclui o arquivo desejado e continua a execução do código
mesmo que ele não ache o arquivo a ser incluso. */
//include("funcoes2.php");

// Inclui o arquivo uma única vez
include_once("funcoes.php");

/* O arquivo requerido é necessário e para a execução do código
caso não encontre o arquivo */

//require("funcoes2.php");

echo imc(90,1.8);
