<?php

class Aplicacao
{
    /**
     * Método estático para ler um arquivo readme.txt
     */
    static function Sobre()
    {
        $fd = fopen("readme.txt","r");
        while ($linha = fgets($fd, 200))
        {
            echo $linha. "<br>";
        }
    }
}
echo "Informações Sobre a aplicação:<br>\n";
echo "===============================:<br>\n";
Aplicacao::Sobre();