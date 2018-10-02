<?php 

namespace Problog\src\Manager;
require '../config/dev.php';

use PDO;

class Manager{


	protected $connection;

	protected function checkConnection(){
		if ($this->connection === null) 
		{
			return $this->getConnection();
		}

		return $this->connection;
	}

	protected function getConnection(){
		$this->connection = new PDO(DB_HOST, DB_USER, DB_PSW);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $this->$connection;

	protected function sql($sql,$parameters = null)
	{
		if ($parameters)
		{
			$result = $this->checkConnection()->prepare($sql);
			$result->execute($parameters);
			return $result;

		}
		else
		{
			$result = $this->checkConnection()->query($sql);
			return $result;
		}
	}

	}
}