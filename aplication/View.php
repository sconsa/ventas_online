<?php
	class View
	{
		private $_controlador;

		public function __construct(Request $peticion)
		{
			$this->_controlador = $peticion->getControlador();
		}

		public function renderizar($vista, $item = false)
		{
			$rutaVista = ROOT . DS . $this->_controlador . DS . $vista . ".phtml";
		}
	}
?>