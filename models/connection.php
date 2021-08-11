<?php
class Connection extends PDO {
	private $bdType = 'mysql';
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $bd = 'crudpoo';

	public function __construct(){
		try {
			parent::__construct($this->bdType . ':host=' . $this->host . ';dbname=' . $this->bd, $this->user, $this->pass);
		} catch(PDOException $e){
			echo 'Error. Details: ' . $e->getMessage();
			exit;
		}
	}
}