<link rel="stylesheet" href="erros_php.css">
<?php
function Abrir($file = null)
{
    if(!$file)
    {
        //trigger_error("Falta o parâmetro com o nome do Arquivo", E_USER_NOTICE);
        //return false;
        throw new Exception("Falta o parâmetro com o nome do Arquivo");
    }

    if (!file_exists($file))
    {
        //trigger_error("O Arquivo ($file) não existe", E_USER_ERROR);
        //return false;
        throw new Exception("O Arquivo ($file) não existe");
    }

    if(!$retorno = @file_get_contents($file))
    {
        //trigger_error("Impossível ler o arquivo", E_USER_WARNING);
        //return false;
        throw new Exception("Impossível ler o arquivo");
    }
    return $retorno;
}

// Abrindo um arquivo
// tratamento de exceções

try {
    $arquivo = Abrir('/tmp/aula.dat');
    echo $arquivo;
} catch (Exception $e) {
    echo $e->getFile().":".$e->getLine()." # ".$e->getMessage();
}