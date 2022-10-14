<?php

$arquivo = "folhas de bananeira.jpg";

$total = strlen($arquivo);

$nome = substr($arquivo, 0, $total-4);
$extensao = substr($arquivo, $total-4, $total);

switch ($extensao) {
    case '.jpg':
        echo "Arquivo JPEG";
        break;
    
    case '.pdf':
        echo "Arquivo PDF";
        break;
    
    case '.doc':
        echo "Arquivo DOC do Word";
        break;

}

