<?php
# Carrega as Classes
include_once "class/Conta1.class.php";
include_once "class/Pessoa1.class.php";

# Criação de um objeto chamado $carlos

$carlos = new Pessoa(10, "Carlos da Silva", 1.85, 25, "10/04/1997", "Ensino Médio", 1500);

// $carlos->Codigo = 10;
// $carlos->Nome = "Carlos da Silva";
// $carlos->Altura = 1.85;
// $carlos->Idade = 25;
// $carlos->Nascimento = "10/04/1997";
// $carlos->Escolaridade = "Ensino Medio";

echo "Manipulando o objeto {$carlos->Nome}: <br>\n";

echo "{$carlos->Nome} é formado em: {$carlos->Escolaridade} <br>\n";
$carlos->Formar("Téc. em Eletricidade");
echo "{$carlos->Nome} é formado em: {$carlos->Escolaridade} <br>\n";

echo "{$carlos->Nome} possui {$carlos->Idade} anos <br>\n";
$carlos->Envelhecer(1);
echo "{$carlos->Nome} possui {$carlos->Idade} anos <br>\n";


# Criação do Objeto $conta_carlos
$conta_carlos = new Conta;
$conta_carlos->Agencia = 6677;
$conta_carlos->Codigo = "CC. 1234.56";
$conta_carlos->DataDeCriacao = "10/07/02";
$conta_carlos->Titular = $carlos;
$conta_carlos->Senha = 9876;
$conta_carlos->Saldo = 567.89;
$conta_carlos->Cancelada = false;

$conta_carlos->Depositar(500);
$conta_carlos->Retirar(100);
echo "Saldo atual: ".$conta_carlos->ObterSaldo()."<br>\n";