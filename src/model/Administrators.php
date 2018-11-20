<?php

namespace ProBlog\src\model;

class Administrators
{
	private $id;
	private $name;
	private $password;
	private $email;


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getname()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPaswword($password)
	{
		$this->password =$password;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}


}