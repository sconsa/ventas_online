<?php
	abstract class Controller // Se crea abstracta para que no pueda ser instanciada
	{
		abstract public function index(); // este metodo es absrtracto obligando a que todas las clases que heren de Controlador implementen el metodo index() por obñogacion aunque este no tenga codigo
	}
?>