<?php
include_once("class/Pessoa.class.php");
include_once("class/Conta.class.php");
include_once("class/ContaCorrente.class.php");
include_once("class/ContaPoupanca.class.php");

$contaBruno = new ContaCorrente("0909", 123456, "13/09/2022", "Bruno Marques", "123456", 1000, 500);
$contaBruno->Depositar(500);
$contaBruno->Retirar(1000);

$contaPBruno = new ContaPoupanca("0909", 123456, "13/09/2022", "Bruno Marques","123456", 100, "13/09/2022");
$contaPBruno->Depositar(1000);
$contaPBruno->Retirar(250);

$contaPBruno->Transferir($contaPBruno, $contaBruno, 200);
$contaBruno->Transferir($contaBruno, $contaPBruno, 5000);

echo "<pre>";
    var_dump($contaBruno, $contaPBruno);
echo "</pre>";