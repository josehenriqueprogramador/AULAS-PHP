<?php
	
	namespace MVC\Controllers;

	class RegistrarController{


		public function index(){

			if(isset($_POST['registrar'])){
				$nome = $_POST['nome'];
				$email = $_POST['email'];
				$senha = $_POST['senha'];

				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					\MVC\Utilidades::alerta('E-mail Inválido.');
					\MVC\Utilidades::redirect(INCLUDE_PATH.'registrar');
				}else if(strlen($senha) < 6){
					\MVC\Utilidades::alerta('Sua senha é muito curta.');
					\MVC\Utilidades::redirect(INCLUDE_PATH.'registrar');
				}else if(\MVC\Models\UsuariosModel::emailExists($email)){
					\MVC\Utilidades::alerta('Este e-mail já existe no banco de dados!');
					\MVC\Utilidades::redirect(INCLUDE_PATH.'registrar');
				}else{
					//Registrar usuário.
					$senha = \MVC\Bcrypt::hash($senha);
					$registro = \MVC\MySql::connect()->prepare("INSERT INTO usuarios VALUES (null,?,?,?,'','')");
					$registro->execute(array($nome,$email,$senha));

					\MVC\Utilidades::alerta('Registrado com sucesso!');
					\MVC\Utilidades::redirect(INCLUDE_PATH);
				}


			}
			
			\MVC\Views\MainView::render('registrar');
			

		}

	}

?>