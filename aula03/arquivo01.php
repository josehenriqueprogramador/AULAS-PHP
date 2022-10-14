<?php

$idade = 70;

/* if ($idade >= 18){
    //Caso a condição acima seja verdadeira
    echo "Maior de idade!";

}else{
    //Caso a a condição acima seja falsa
    echo "Menor de idade!";
} */

/* if($idade >= 65){
    echo "Melhor idade";
}elseif($idade >= 18){
    echo "Maior de idade";
}else{
    echo "Menor de idade";
} */

//              CONDIÇÃO         VERDADEIRA          FALSA
$resultado = ($idade >= 18) ? "Maior de idade" : "Menor de idade";
echo $resultado;
