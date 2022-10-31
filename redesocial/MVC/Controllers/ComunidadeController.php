<?php
	
	namespace MVC\Controllers;

	class ComunidadeController{


		public function index(){
			if(isset($_SESSION['login'])){

				if(isset($_GET['solicitarAmizade'])){
					$idPara = (int) $_GET['solicitarAmizade'];
					if(\MVC\Models\UsuariosModel::solicitarAmizade($idPara)){
						\MVC\Utilidades::alerta('Amizade solicitada com sucesso!');
						\MVC\Utilidades::redirect(INCLUDE_PATH.'comunidade');
					}else{
						\MVC\Utilidades::alerta('Ocorreu um erro ao solicitar a amizade...');
						\MVC\Utilidades::redirect(INCLUDE_PATH.'comunidade');
					}
				}

			\MVC\Views\MainView::render('comunidade');
			}else{
				\MVC\Utilidades::redirect(INCLUDE_PATH);
			}
			
		}

	}

?>