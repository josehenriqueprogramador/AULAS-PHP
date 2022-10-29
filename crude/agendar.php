<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadidatar-se a vaga');

use \Henriquejardim\Entity\Vaga;
$obAgendamento = new Agendamento;
//echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['data'])){

  $obAgendamento->nome    = $_POST['nome'];
  $obAgendamento->descricao = $_POST['data'];
  $obAgendamento->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/agenda.php';
include __DIR__.'/includes/agendados.php';
include __DIR__.'/includes/footer.php';
?>
