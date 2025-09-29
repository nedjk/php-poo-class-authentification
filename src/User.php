<?php

namespace App;

class User
{
	private string $username;
	private string $password;
	private string $role;
	private int $id;

	public function getPassword():string
	{
		return $this->password;
	}
	public function getId():string
	{
		return $this->id;
	}
	public function getRole():string
	{
		return $this->role;
	}
	public function getUsername():string
	{
		return $this->username;
	}
}
