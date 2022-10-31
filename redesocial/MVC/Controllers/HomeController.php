<?php
	
	namespace MVC\Controllers;

	class HomeController{


		public function index(){

			if(isset($_GET['loggout'])){
				session_unset();
				session_destroy();

				\MVC\Utilidades::redirect(INCLUDE_PATH);
			}


			if(isset($_SESSION['login'])){
				//Renderiza a home do usuário.

				//Existe pedido de amizade?

				if(isset($_GET['recusarAmizade'])){
					$idEnviou = (int) $_GET['recusarAmizade'];
					\MVC\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou,0);
					\MVC\Utilidades::alerta('Amizade Recusada :(');
					\MVC\Utilidades::redirect(INCLUDE_PATH);
				}else if(isset($_GET['aceitarAmizade'])){
					$idEnviou = (int) $_GET['aceitarAmizade'];
					if(\MVC\Models\UsuariosModel::atualizarPedidoAmizade($idEnviou,1)){
					\MVC\Utilidades::alerta('Amizade aceita!');
					\MVC\Utilidades::redirect(INCLUDE_PATH);
					}else{
					\MVC\Utilidades::alerta('Ops.. um erro ocorreu!');
					\MVC\Utilidades::redirect(INCLUDE_PATH);
					}
				}


				//Existe postagem no feed?


				if(isset($_POST['post_feed'])){

					if($_POST['post_content'] == ''){
						\MVC\Utilidades::alerta('Não permitimos posts vázios :(');
						\MVC\Utilidades::redirect(INCLUDE_PATH);
					}

					\MVC\Models\HomeModel::postFeed($_POST['post_content']);
					\MVC\Utilidades::alerta('Post feito com sucesso!');
					\MVC\Utilidades::redirect(INCLUDE_PATH);
				}


				\MVC\Views\MainView::render('home');
			}else{
				//Renderizar para criar conta.

				if(isset($_POST['login'])){
					$login = $_POST['email'];
					$senha = $_POST['senha'];

					

					//Verificar no banco de dados.

					$verifica = \MVC\MySql::connect()->prepare("SELECT * FROM usuarios WHERE email = ?");
					$verifica->execute(array($login));



					
					if($verifica->rowCount() == 0){
						//Não existe o usuário!
						\MVC\Utilidades::alerta('Não existe nenhum usuário com este e-mail...');
						\MVC\Utilidades::redirect(INCLUDE_PATH);
					}else{
						$dados = $verifica->fetch();
						$senhaBanco = $dados['senha'];
						if(\MVC\Bcrypt::check($senha,$senhaBanco)){
							//Usuário logado com sucesso
							
							$_SESSION['login'] = $dados['email'];
							$_SESSION['id'] = $dados['id'];
							$_SESSION['nome'] = explode(' ',$dados['nome'])[0];
							$_SESSION['img'] = $dados['img'];
							\MVC\Utilidades::alerta('Logado com sucesso!');
							\MVC\Utilidades::redirect(INCLUDE_PATH);
						}else{
							\MVC\Utilidades::alerta('Senha incorreta....');
							\MVC\Utilidades::redirect(INCLUDE_PATH);
						}
					}
					

				}

				\MVC\Views\MainView::render('login');
			}

		}

	}

?>