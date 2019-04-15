<?php

class Model
{
	protected $_connection;
	function __construct()
	{
		$host = 'localhost';
		$dbname = 'sten';
		$user = 'root';
		$pass = '';

		try
		{
			$this->_connection = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}
}
?>