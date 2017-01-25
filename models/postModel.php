<?php
	class postModel extends Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function getPosts()
		{
			// Simulamos la traida de datos antes de crear la base de datos
			/*
			$post = array(
				"id" => 1,
				"titulo" => "Titulo post",
				"cuerpo" => "Cuerpo post"
			);
			return $post;
			*/

			$post = $this->_bd->query("Select * FROM post;");
			//$post = $this->_bd->query("TRUNCATE TABLE post;");
			return $post->fetchall();
		}
	}
?>