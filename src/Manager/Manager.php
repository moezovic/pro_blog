<?php 

namespace Problog\src\Manager;

use PDO;

class Manager{

	const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
	const DB_USER = 'root';
	const DB_PSW = 'root';

	protected $connection;

	protected function checkConnection(){
		if ($this->connection === null) 
		{
			return $this->getConnection();
		}

		return $this->connection;
	}

	protected function getConnection(){
		$this->connection = new \PDO(self::DB_HOST, self::DB_USER, self::DB_PSW);
		$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

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