<link rel="stylesheet" href="erros_php.css">
<?php
function Abrir($file = null)
{
    if(!$file)
    {
        WSError("Falta o parâmetro com o nome do Arquivo", WS_INFOR);
        return false;
    }

    if (!file_exists($file))
    {
        WSError("O Arquivo ($file) não existe", WS_ERROR, true);
        return false;
    }

    if(!$retorno = @file_get_contents($file))
    {
        WSError("Impossível ler o arquivo", WS_ALERT);
        return false;
    }
    return $retorno;
}

function manipula_erro($numero, $mensagem, $arquivo, $linha)
{
    $mensagem = "Arquivo $arquivo : Linha $linha # no. $numero : $mensagem\n";

    //escreve no log de erro
    $log = fopen("erros.log","a");
    fwrite($log, $mensagem);
    fclose($log);

    // se for uma warning
    if($numero == E_USER_WARNING)
    {
        echo $mensagem;
    }
    else if($numero == E_USER_ERROR)
    {
        echo $mensagem;
        die();
    }
}

/**
 * ERROS PERSONALIZADOS PELO PROFESSOR USANDO CSS
 */

define('WS_ACCEPT', 'accept');
define('WS_INFOR', 'infor');
define('WS_ALERT', 'alert');
define('WS_ERROR', 'error');

function WSError($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? WS_INFOR : ($ErrNo == E_USER_WARNING ? WS_ALERT : ($ErrNo == E_USER_ERROR ? WS_ERROR : $ErrNo)));
    echo "<p class='trigger {$CssClass}'>{$ErrMsg}<span class='ajax_close'>X</span></p>";
    if ($ErrDie) {
        die;
    }
}

// define a função manipula_erro como manipuladora dos erros ocorridos
set_error_handler('WSError');

$arquivo = Abrir('readme.txt');
echo "CONTEÚDO DO ARQUIVO<br>";
echo $arquivo;