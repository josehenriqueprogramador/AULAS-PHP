<section class="agendamentos">
		<div class="center">

			<?php
				if(isset($_GET['excluir'])){
					$id = (int)$_GET['excluir'];
					$pdo->exec("DELETE FROM `tb_agendados` WHERE id = $id");
					echo '<div class="sucesso">O agendamento foi deletado com sucesso!</div>';
				}
				$info = $pdo->prepare("SELECT * FROM `tb_agendados`");
				$info->execute();
				$info = $info->fetchAll();
				foreach ($info as $key => $value) {
			?>
			<div class="box-single-horario">
				<div class="box-single-wraper">
					Nome: <?php echo $value['nome'] ?><br />
					Data e Horário: <?php echo date('d/m/Y H:i:s',strtotime($value['horario'])); ?>
					<br />
					<a href="?excluir=<?php echo $value['id']; ?>">Excluir!</a>
				</div>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</section>
	<a href="index.php">voltar</a>