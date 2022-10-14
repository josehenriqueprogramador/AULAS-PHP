<?php

class ContaCorrente extends Conta
{
    public $Limite;

    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Limite)
    {
        parent::__construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
        $this->Limite = $Limite;
    }

    public function Retirar($quantia)
    {
        // Imposto sobre movimentação financeira
        $cpmf = 0.05;

        if(($this->Saldo + $this->Limite) >= $quantia)
        {
            parent::Retirar($quantia);
            parent::Retirar($quantia*$cpmf);
        }else{
            echo "Retirada não permitida... <br>\n";
            return false;
        }

        return true;
    }
}