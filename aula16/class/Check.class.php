<?php

Abstract class Check 
{
    private static $data;
    private static $format;
    
    public static function campo($campo, $valor)
    {
        $formato = [];
        $formato["email"]= "/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/";
        $formato["tel"]="/[0-9]{2}+\ [0-9]{4,5}+\-[0-9]{4}$/"; //Formato 99 09999-9999
        $formato["cep"]="/[0-9]{5}+\-[0-9]{3}$/"; //Formato 99999-999
        $formato["cpf"]="/[0-9]{3}+\.[0-9]{3}+\.[0-9]{3}+\.[0-9]{2}$/"; //Formato 999.999.999-99

        if(preg_match($formato[$campo], $valor))
        {
            return true;
        }else{
            return false;
        }
    }
}