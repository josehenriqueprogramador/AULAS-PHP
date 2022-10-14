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

    function __construct($Agencia, $Codigo, $DataDeCriacao, $Titular, $Senha, $Saldo)
    {
        $this->Agencia = $Agencia;
        $this->Codigo = $Codigo;
        $this->DataDeCriacao = $DataDeCriacao;
        $this->Titular = $Titular;
        $this->Senha = $Senha;
        
        $this->Depositar($Saldo);
        $this->Cancelada = false;
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

    /**
     * Método transferir
     * Transfere um valor da conta de origem para a conta de destino
     */
    public function Transferir($ContaOrigem, $ContaDestino, $quantia)
    {
        /**
         * Retiro o valor da conta de Origem
         */
        $ContaOrigem->Retirar($quantia);
        /**
         * Deposito o valor na conta de Destino
         */
        $ContaDestino->Depositar($quantia);
    }
}