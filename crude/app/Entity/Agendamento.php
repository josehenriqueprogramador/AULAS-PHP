<?php

namespace Henriquejardim\Entity;

use \Henriquejardim\Db\Database;
use \PDO;

class Agendamento{

  /**
   * Identificador único do agendamento
   * @var integer
   */
  public $id;

  /**
   * Nome de quem está agendando
   * @var string
   */
  public $nome;

  
  /**
   * Data para o agendamento
   * @var string
   */
  public $data;

  /**
   * Método responsável por cadastrar um novo agendamento no banco
   * @return boolean
   */
  public function cadastrar(){
    //DEFINIR A DATA
   // $this->data = date('Y-m-d H:i:s');

    //INSERIR O AGENDAMENTO NO BANCO
    $obDatabase = new Database('tb_agendados');
    //echo "<pre>"; print_r($obDatabase); echo "</pre>"; exit;
    $this->id = $obDatabase->insert([
                                      'nome'    => $this->nome,
                                       'horario'   => $this->horario
                                    ]);
    //echo "<pre>"; print_r($this); echo "</pre>"; exit;
    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por atualizar o agendamento no banco
   * @return boolean
   */
  public function atualizar(){
    return (new Database('tb_agendados'))->update('id = '.$this->id,[
                                                                'nome'    => $this->nome,
                                                                'horario'    => $this->horario
                                                              ]);
  }

  /**
   * Método responsável por excluir o agendamento no banco
   * @return boolean
   */
  public function excluir(){
    return (new Database('tb_agendados'))->delete('id = '.$this->id);
  }

  /**
   * Método responsável por obter os agendamentos  do banco de dados
   * @param  string $where
   * @param  string $order
   * @param  string $limit
   * @return array
   */
  public static function getAgendamentos($where = null, $order = null, $limit = null){
    return (new Database('tb_agendados'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
  }

  /**
   * Método responsável por buscar um agendamento com base em seu ID
   * @param  integer $id
   * @return Agendamento
   */
  public static function getAgendamento($id){
    return (new Database('tb_agendados'))->select('id = '.$id)
                                  ->fetchObject(self::class);
  }

}