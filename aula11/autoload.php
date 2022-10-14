<?php
spl_autoload_register(
    function($classe)
    {
        if(file_exists("class/{$classe}.class.php"))
        {
            require_once("class/{$classe}.class.php");
            return true;
        }
        return false;
    }
);