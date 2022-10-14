<?php
/**
 * Gera tabuada informando um número inteiro
 */
function tabuada(int $a){
    $res =  "<p style='background-color:#e3e3e3; color:red'>Tabuada do $a <br>\n\r";
    for ($i = 0; $i <= 10; $i++){
        $resultado = $i * $a;
        $res .= "$a X $i = $resultado <br>\n";
    }
    $res .= "</p>";

    return $res;
}

function imc(float $peso, float $altura):string{
    /**
     * TABELA DE CALCULO IMC
     * 
     * IMC = PESO / ALTURA * ALTURA
     * 
     * IMC                      CLASSIFICAÇÃO
     * abaixo de 18,5           Abaixo do peso
     * entre 18,6 e 24,9        Peso ideal
     * entre 25,0 e 29,9        Levemente acima do peso
     * entre 30,0 e 34,9        Obesidade I
     * entre 35,0 e 39,9        Obesidade II (SEVERA)
     * acima de 40              Obesidade III (MÓRBIDA)            
     */
    $msg = "";

    $imc = $peso/($altura*$altura);

    if($imc >= 40){
        $msg = "Obesidade III (MÓRBIDA)";
    }elseif($imc >= 35){
        $msg = "Obesidade II (SEVERA)";
    }elseif ($imc >= 30) {
        $msg = "Obesidade I";
    }elseif ($imc >= 25) {
        $msg = "Peso Ideal";
    }else{
        $msg = "Abaixo do peso";
    }
    return $msg;
}
