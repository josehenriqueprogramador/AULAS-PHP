<?php

$a = 1;
//$tabuada = 5;

while ($a <= 10) {
    echo "<p>Tabuada do $a <br>";
    for ($i = 0; $i <= 10; $i++){
        $resultado = $i * $a;
        echo "$a X $i = $resultado <br>";
    }
    echo "</p>";
    $a++;
}

/* for ($i = 0; $i <= 10; $i++){
    $resultado = $i * $tabuada;
    echo "$tabuada X $i = $resultado <br>";
} */