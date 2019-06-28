<?php
namespace Modelo;

class Database{

	protected $database;
	private $id;
	private $nombre;
	private $usuario;
	private $pass;
	public function __construct($container)
	{
		$this->database = $container->database;
	}

	
}