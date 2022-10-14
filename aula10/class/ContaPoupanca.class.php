<?php
class ContaPoupanca extends Conta
{
    public $Aniversario;

    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo, $Aniversario)
    {
        parent::__construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo);
        $this->Aniversario = $Aniversario;
    }

    public function Retirar($quantia)
    {
        if($this->Saldo >= $quantia)
        {
            parent::Retirar($quantia);
        }else{
            echo "Retirada não permitida... \n";
            return false;
        }
        return true;
    }
}