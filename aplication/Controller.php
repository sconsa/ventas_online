<?php
	abstract class Controller // Se crea abstracta para que no pueda ser instanciada
	{
		protected $_view;

		public function __construct()
		{
			$this->_view = new View( new Request); // De esta forma se tiene el objeto View en eol controlador principal
		}

		abstract public function index(); // este metodo es absrtracto obligando a que todas las clases que heren de Controlador implementen el metodo index() por obñogacion aunque este no tenga codigo

		/**
			Este modelo importara los modelos
		*/
		protected function loadModel($modelo)
		{
			$modelo = $modelo . "Model";
			$rutaModelo = ROOT . "models" . DS . $modelo . ".php";
			//echo $rutaModelo . "<br/>";
			if(is_readable($rutaModelo)) // Verificamos si el modelo es legible
			{
				require_once $rutaModelo; // Llamamos al modelo
				$modelo = new $modelo; // Instanciamos al modelo
				return $modelo; // retornamos el modelo
			}
			else
			{
				throw new Exception("Error de Modelo");
			}
		}

		/**
			Este metodo nos permitira cargar librerias
		*/
		protected function getLibrary($libreria)
		{
			$rutaLibreria = ROOT . "libs" . DS . $libreria . ".php";
			if(is_readable($rutaLibreria))
			{
				require_once $rutaLibreria;
			}
			else
			{
				echo $rutaLibreria . "<br/><br/>";
				throw new Exception("Error de Libreria");
				
			}
		}
	}
?>