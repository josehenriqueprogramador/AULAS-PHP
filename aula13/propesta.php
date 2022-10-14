<?php
class Aplicacao
{
    static $Quantidade;

    function __construct($Nome)
    {
        //incrementa o Atributo Statico quantidade
        self::$Quantidade++;
        $i = self::$Quantidade;
        echo "Nova Aplicação nr. $i: $Nome<br>\n";
    }
}

#Criando os objetos
new Aplicacao("Gimp");
new Aplicacao("WPS Office");
new Aplicacao("Windows");
new Aplicacao("Photoshop");
new Aplicacao("Visual Studio Code");