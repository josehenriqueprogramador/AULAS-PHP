<?php

include_once("Funcionario1.class.php");
include_once("Estagiario.class.php");

$pedro = new Estagiario;
$pedro->SetSalario(248);

echo "Salário do Pedro: R$".number_format($pedro->GetSalario(),2,",",".");