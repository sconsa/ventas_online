<?php
	// De esta clase extenderan todos los modelos
	class Model
	{
		protected $_bd;

		public function __construct()
		{
			//$this->_db = new Database(); // Comentamos para simular la consulta de datos 
			$this->_bd = new Database();
		}
	}
?>