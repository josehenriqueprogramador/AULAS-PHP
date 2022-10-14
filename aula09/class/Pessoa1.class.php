<?php
class Pessoa
{
    public $Codigo;
    public $Nome;
    public $Altura;
    public $Idade;
    public $Nascimento;
    public $Escolaridade;
    Public $Salario;

    function __construct($Codigo, $Nome, $Altura, $Idade, $Nascimento, $Escolaridade, $Salario)
    {
        $this->Codigo = $Codigo;
        $this->Nome = $Nome;
        $this->Altura = $Altura;
        $this->Idade = $Idade;
        $this->Nascimento = $Nascimento;
        $this->Escolaridade = $Escolaridade;
        $this->Salario = $Salario;
    }

    /**
     * Método Crescer
     * aumenta a altura em $centimetros
     */
    public function Crescer($centimetros)
    {
       if ($centimetros > 0)
       {
            $this->Altura += $centimetros;
       } 
    } 
    /**
     * Método Formar
     * altera a Escolaridade para $titulacao  
     */ 
    public function Formar($titulacao)
    {
        $this->Escolaridade = $titulacao;
    }
    /**
     * Método Envelhecer  
     * aumenta a idade em $anos
     */ 
    public function Envelhecer($anos)
    {
        if($anos > 0)
        {
            $this->Idade += $anos;
        }
        
    }
}