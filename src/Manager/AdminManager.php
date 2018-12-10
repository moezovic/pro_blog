<?php

namespace ProBlog\src\Manager;

use ProBlog\src\model\Administrators;

/**
 * The AdminManager class.
 *
 * manage the administrator table in the DB.
 */
class AdminManager extends Manager
{
    public function getAdmin()
    {
        $sql = 'SELECT id, name, password FROM administrators';
        $result = $this->sql($sql);
        $admins = [];
        foreach ($result as $row) {
            $adminId = $row['id'];
            $admins[$adminId] = $this->hydrate($row);
        }

        return $admins;
    }

    public function insertAdmin()
    {
        $name = htmlspecialchars($_POST['name']);
        $pswd = password_hash(htmlspecialchars($_POST['pswd']), PASSWORD_DEFAULT);

        $sql = 'INSERT INTO administrators (name, password) VALUES(:name, :pswd)';
        $this->sql($sql, [':name' => $name, ':pswd' => $pswd]);
    }

    private function hydrate(array $row)
    {
        $adminObj = new Administrators();
        foreach ($row as $key => $value) {
            if (preg_match('/_/', $key)) {
                $explodString = explode('_', $key);
                foreach ($explodString as $index => $value) {
                    $explodString[$index] = ucfirst($value);
                }
                $key = implode($explodString);
            } else {
                $key = ucfirst($key);
            }

            $method = 'set'.$key;

            if (method_exists($adminObj, $method)) {
                $adminObj->$method($value);
            }
        }

        return $adminObj;
    }
}
