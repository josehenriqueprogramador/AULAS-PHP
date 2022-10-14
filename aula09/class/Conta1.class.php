<?php
class Conta
{
    public $Agencia;
    public $Codigo;
    public $DataDeCriacao;
    public $Titular;
    public $Senha;
    public $Saldo;
    public $Cancelada;

    function __destruct()
    {
        echo "Objeto Conta {$this->Codigo} de {$this->Titular->Nome}";
    }

    /**
     * Método Retirar
     * diminui o Saldo em $quantia
     */
    public function Retirar($quantia)
    {
        if($quantia > 0)
        {
            $this->Saldo -= $quantia;
        }
    }

    /**
     * Método Depositar
     * aumenta o Saldo em $quantia
     */
    public function Depositar($quantia)
    {
        if($quantia > 0)
        {
            $this->Saldo += $quantia;
        }
    }

    /**
     * Método ObterSaldo
     * retorna o Saldo Atual
     */
    public function ObterSaldo()
    {
        return $this->Saldo;
    }
}