<?php
$i = 3;
switch ($i) {
    case 0:
        echo "i é igual a 0";
        break;
    case 1:
        echo "i é igual a 1";
        break;
    case 2:
        echo "i é igual a 2";
        break;    
    default:
        echo "i não é igual a 0, 1 ou 2";
        break;
}

$carros = ["Gol","Uno", "Palio"];

foreach ($carros as $key => $value) {
    echo "<p>No Indice[$key] o Valor é $value</p>";
}