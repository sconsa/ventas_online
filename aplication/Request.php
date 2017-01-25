<?php
	/**
	* 
	*/
	class Request
	{
		private $_controlador;
		private $_metodo;
		private $_argumentos;

		public function __construct() 
		{
			if(isset($_GET['url']))
			{
				//$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); // filter_inpiut toma el parametro INPUT_GET por via GET, lo pasa por FILTER_SANTINIZE_URL y lo devuelve filtrado es decir, Elimina todos los caracteres excepto letras, dígitos y $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=
				$url = filter_input(INPUT_GET, 'url', FILTER_UNSAFE_RAW); // FILTER_UNSAFE_RAW es igual a FILTER_DEFAULT No hace nada, opcionalmente eliminar o condificar caracteres
				$url = explode('/', $url); // Creamos un arreglo diviendo la url por cada '/' que encuentre.
				$url = array_filter($url); // Elimina todos aquellos elementos que no sean validos en la url.

				$this->_controlador = strtolower(array_shift($url)); // array_shift() --> extrae el primer elemento del arreglo y lo devuleve
				$this->_metodo = strtolower(array_shift($url)); // array_shift() --> el arreglo llega sin el primer elemento
				$this->_argumentos = $url; // El resto es asignado a los argumentos
			}

			if(!$this->_controlador)
			{
				$this->_controlador = DEFAULT_CONTROLLER;
			}

			if(!$this->_metodo)
			{
				$this->_metodo = 'index';
			}

			if(!isset($this->_argumentos))
			{
				$this->_argumentos = array();
			}
		}

		public function getControlador()
		{
			return $this->_controlador;
		}

		public function getMetodo()
		{
			return $this->_metodo;
		}

		public function getArgumentos()
		{
			return $this->_argumentos;
		}
	}
?>