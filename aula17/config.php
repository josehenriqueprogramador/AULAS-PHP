<?php
session_start();
// DEFINIÇÕES DO BANCO DE DADOS
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DBNAME', 'aulasphp');
define('DNS', 'mysql:host='.MYSQL_HOST.'; dbname='.MYSQL_DBNAME.'; charset=UTF8');

function myAutoload($class)
{
    $dir = __DIR__.DIRECTORY_SEPARATOR."class";

    if(file_exists($dir.DIRECTORY_SEPARATOR.$class.".class.php"))
    {
        require_once $dir.DIRECTORY_SEPARATOR.$class.".class.php";
    }else{
        WSError("Erro ao incluir a classe {$class}", WS_ERROR);
    }
}

spl_autoload_extensions(".php");
spl_autoload_register("myAutoload");

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

function checkLogin()
{
    if(!isset($_SESSION['usr']) || is_null($_SESSION['usr'])){
        header("location:login.php");
    }
}