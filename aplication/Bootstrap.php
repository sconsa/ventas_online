<?php
	// Cuando se envia un metodo y un controlador. lo que ara el Bootstrap es llamar al controlador y al metodo que es enviado. Si no es enviado un metodo, ira al index y ejecutara el metodo por default
	class Bootstrap
	{
		public static function run(Request $peticion)
		{
			$controller = $peticion->getControlador() . "Controller";
			$rutaControlador = ROOT . "controllers" . DS . $controller . ".php";
			$metodo = $peticion->getMetodo();
			$argumentos = $peticion->getArgumentos();

			/*echo "controller:" . $controller . "<br/>";
			echo "ruta: controllers" . DS . $controller . ".php<br/><br/><br/>";

			echo $rutaControlador; exit();
			*/

			if(is_readable($rutaControlador)) // verificamos si el archivo de la ruta enviada existe y si es legible lo importara
			{
				require_once($rutaControlador);

				$controller = new $controller; // Instanciamos una clase del index controler

				if(is_callable(array($controller, $metodo))) // Si se recibe un metodo que no es valido lo establecera en metodo index
				{
					$metodo = $peticion->getMetodo();
				}
				else
				{
					$metodo = "index";
				}

				if(isset($argumentos))
				{
					call_user_func_array(array($controller, $metodo), $argumentos); // Enviamos el nombre de la clase y el metodo que queremos llamar en esa clase y los parametros wque queremos pasarle a este metodo que estamos llamando
				}
				else
				{
					call_user_func(array($controller, $metodo));
				}
			}
			else
			{
				throw new Exception("Controlador: <strong>" . $peticion->getControlador() . "</strong> no encontrado<br/>El archivo: <strong>" . $controller . ".php</strong> no existe en la<br/>Ruta: <strong>controllers/</strong><br/>Origen del mensaje: <strong>/aplication/Bootstrap.php</strong>");
			}
		}
	}
?>