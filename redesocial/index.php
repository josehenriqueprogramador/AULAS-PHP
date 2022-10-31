<?php
	
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	require('vendor/autoload.php');

	define('INCLUDE_PATH_STATIC','http://localhost/redesocial/MVC/Views/pages/');
	define('INCLUDE_PATH','http://localhost/redesocial/');
	$app = new MVC\Application();

	$app->run();

?>