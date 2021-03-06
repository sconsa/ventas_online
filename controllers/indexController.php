<?php
	class indexController extends Controller
	{
		public function __construct() // Llama el metodo consttuctor de la clase padre (Controller)
		{
			parent::__construct();
		}

		public function index()
		{
			$post = $this->loadModel('post');

			$this->_view->posts = $post->getPosts();

			$this->_view->titulo = "Portada";
			//echo "Hola desde el indexController...";

			// No es necesario crear las vistas con el mismo nombre que el metodo
			// El primer parametro es la vista, el segundo es el item con el que se casara para que al pintar el menu se indique que menu esta seleccionado
			$this->_view->renderizar("index", "inicio");
		}
	}
?>