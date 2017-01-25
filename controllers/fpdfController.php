<?php
	class fpdfController extends Controller
	{
		private $_fpdf;

		public function __construct()
		{
			parent::__construct();

			// Importamos la liberia para poderla usar en todo el controlador
			$this->getLibrary("fpdf");
			$this->_fpdf = new FPDF();
		}

		public function index(){}

		public function fpdf1($nombre, $apellidos)
		{
			// Existen dos modos, podemos importar la libreria desde este metodo
			//$this->getLibrary("fpdf");
			// o podemos importarla desde el contructor permitiendo utilizARLA en cualquier parte del controloador

			$imprimir = utf8_decode($nombre . ' ' . $apellidos); // Con utf8_decode() corregimos caracteres
			$this->_fpdf->AddPage();
	        $this->_fpdf->SetFont('Arial','B',16);
	        $this->_fpdf->Cell(40,10, $imprimir);
	        $this->_fpdf->Output();
		}

		public function fpdf2($nombre, $apellidos)
		{
			// Existen dos modos, podemos importar la libreria desde este metodo
			//$this->getLibrary("fpdf");
			// o podemos importarla desde el contructor permitiendo utilizARLA en cualquier parte del controloador

			// Tambien se puede crear un archivo exclusivo para la funcion ubicado en la carpeta /public/files/fpdf2.php
			/*
			$imprimir = utf8_decode("FPDF_2 " . $nombre . ' ' . $apellidos); // Con utf8_decode() corregimos caracteres
			$this->_fpdf->AddPage();
	        $this->_fpdf->SetFont('Arial','B',16);
	        $this->_fpdf->Cell(40,10, $imprimir);
	        $this->_fpdf->Output();
	        */

	        // Incluimos el archivo que contiene las lineas de codigo en la carpeta /public/files/fpdf2.php
	        require_once ROOT . "public" . DS . "files" . DS . "fpdf2.php";
		}
	}
?>