<?php
class Biblioteca
{
    const Nome = "GTK";
}

class Aplicacao extends Biblioteca
{
    const Ambiente = "Gnome Desktop";
    const Versao = "3.8";

    /**
     * Método construtor
     * acesso as constantes internamente
     */

    function __construct($Nome)
    {
        echo parent::Nome ." ". self::Ambiente ." - ". self::Versao ." ".$Nome. "<br>";
    } 
}

/**
 * Acesso as constantes externamente
 */

 echo Biblioteca::Nome ." ". Aplicacao::Ambiente ." - ". Aplicacao::Versao . "<br>";

 new Aplicacao("Dia");
 new Aplicacao("Gimp");