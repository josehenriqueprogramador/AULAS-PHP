<?php
include_once("autoload.php");
// include_once("class/Conta.class.php");
// include_once("class/ContaCorrente.class.php");
// include_once("class/ContaPoupanca.class.php");

$conta1 = new ContaCorrente("09090",123456,"15/09/2022","Bruno Marques","123456", 1000, 500);
$conta2 = new ContaCorrente("09090",123453,"15/09/2022","João das Couves","123456", 1000, 500);

$conta1->Transferir($conta2,2000);
echo "<pre>";
var_dump($conta1, $conta2);
echo "</pre>";