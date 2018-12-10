<?php

namespace ProBlog\src\Manager;

require_once '../config/dev.php';

use PDO;

class Manager
{
    private $connection;

    private function checkConnection()
    {
        if (null === $this->connection) {
            return $this->getConnection();
        }

        return $this->connection;
    }

    private function getConnection()
    {
        $this->connection = new PDO(DB_HOST, DB_USER, DB_PSW);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->connection;
    }

    protected function sql($sql, $parameters = null)
    {
        if ($parameters) {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);

            return $result;
        } else {
            $result = $this->checkConnection()->query($sql);

            return $result;
        }
    }
}
