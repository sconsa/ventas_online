<?php
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(dirname(__FILE__)) . DS);
	define('APP_PATH', ROOT . 'aplication' . DS);

	require_once APP_PATH . 'Bootstrap.php';
	require_once APP_PATH . 'Config.php';
	require_once APP_PATH . 'Controller.php';
	require_once APP_PATH . 'Model.php';
	require_once APP_PATH . 'Registro.php';
	require_once APP_PATH . 'Request.php';
	require_once APP_PATH . 'View.php';
	
	//echo '<pre>' . print_r(get_required_files());

	/*
	$r = new Respuesta(); // Creamos una instancia del objeto para poder acceder a los valores recuperados por la URL

	echo $r->getControlador() . '<br/>';
	echo $r->getMetodo() . '<pre>';
	print_r($r->getArgumentos());
	*/

	// En caso de que el controlador enviado desde la url no exista, la excepcion la controlamos a continuacion
	try{
		Bootstrap::run(new Request);
	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}
?>