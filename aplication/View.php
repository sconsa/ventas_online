<?php
	class View
	{
		private $_controlador;

		public function __construct(Request $peticion)
		{
			$this->_controlador = $peticion->getControlador();
		}

		// Este metodo se encarga de hacer el llamado de la vista recibida
		/**
			@item Indica que menu se debe de activar con la clase cuerrent
		*/
		public function renderizar($vista, $item = false)
		{
			/*** ARRAY PARA EL ARMADO DEL MENU DEL SISTEMA ***/
			$menu = array( // Arreglo asociativo para el menu y submenus, es decir, un arreglo de submenus por cada menu del arreglo principal
				array(
					"id" => "inicio", // Identificador del menu en cuestion
					"titulo" => "Titulo", // Texto que se mostrara en la vista
					"enlace" => BASE_URL // Ruta del archivo al que direccionara
				),
				array(
					"id" => "hola",
					"titulo" => "Hola",
					"enlace" => BASE_URL . "hola"
				),
				array(
					"id" => "fpdf",
					"titulo" => "FPDF",
					"enlace" => BASE_URL . "fpdf/fpdf1/Said/Alarcón Sosa"
				),
				array(
					"id" => "fpdf2",
					"titulo" => "FPDF_2",
					"enlace" => BASE_URL . "fpdf/fpdf2/Said/Alarcón Sosa"
				)
			);

			/*** ARREGLO PARA LAS RUTAS DE ACCESO A LOS ARCHIVOS CSS, IMG Y JS DEL PROYECTO ***/
			$_layoutParams = array(
				"ruta_css" => BASE_URL . "views/layout/" . DEFAULT_LAYOUT . "/css/",
				"ruta_img" => BASE_URL . "views/layout/" . DEFAULT_LAYOUT . "/img/",
				"ruta_js" => BASE_URL . "views/layout/" . DEFAULT_LAYOUT . "/js/",
				"menu" => $menu
			);

			$rutaView = ROOT . "views" . DS . $this->_controlador . DS . $vista . ".phtml";

			if(is_readable($rutaView))
			{
				include_once ROOT . "views" . DS . "layout" . DS . DEFAULT_LAYOUT . DS . "encabezado.php";
				include_once $rutaView;
				include_once ROOT . "views" . DS . "layout" . DS . DEFAULT_LAYOUT . DS . "pie_pagina.php";
			}
			else
			{
				throw new Exception("Error de Vista");
				
			}
		}
	}
?>