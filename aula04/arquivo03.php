<?php

function km2mi($quilometros){
    static $total;
    $total += $quilometros;
    return "<p>Percorreu ". $quilometros * 0.6 .
    " milhas e percorreu um total de $total kms</p>";
}

echo km2mi(100);
echo km2mi(300);
echo km2mi(200);
