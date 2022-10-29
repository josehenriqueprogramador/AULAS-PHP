<?php
	date_default_timezone_set('America/Sao_Paulo');
	//$pdo = new PDO('mysql:host=localhost;dbname=faetec_vagas','root','');
?>



<main>

  <section>
    <a href="index.php">
      <button class="btn btn-success">Voltar</button>
    </a>
  </section>

  <h2 class="mt-3"><?=TITLE?></h2>

  <form method="post">

    <div class="form-group">
      <label>Título</label>
      <input type="text" class="form-control" name="titulo" value="<?=$obAgendamento->nome?>">
      <select class="form-select" aria-label="Default select example">
      <option selected>selecone a melhor data</option>
      <?php
      for($i = 0; $i <= 23; $i++){
        $hora = $i;
        if($i < 10){
          $hora = '0'.$hora;
        }

        $hora.=':00:00';
        $verifica = date('Y-m-d').' '.$hora;
        $sql = $pdo->prepare("SELECT * FROM `tb_agendados` WHERE horario = '$verifica'");
        $sql->execute();

        if($sql->rowCount() == 0 && strtotime($verifica) > time()){
          $dataHora = date('d/m/Y').' '.$hora;
          echo '<option value="'.$dataHora.'">'.$dataHora.'</option>';
        }
       
      }
      ?>
    
    </select>
    </div>

        

    <div class="form-group">
      <button type="submit" class="btn btn-success">Enviar</button>
    </div>

  </form>

</main>


