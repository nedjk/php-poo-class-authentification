<?php

namespace App;

use PDO;

class Auth {

	private $pdo;
	private $loginPath;
	private $homePath;

	public function __construct(PDO $pdo,string $loginPath,string $homePath)
	{
		$this->pdo = $pdo;
		$this->loginPath = $loginPath;
		$this->homePath = $homePath;
	}

	public function requireRole(string ...$roles):void
	{
		$user = $this->user();
		$path = $this->homePath;
		$param = '?forbid=1';
		if($user === null || !in_array($user->getRole(),$roles))
		{
			if($user === null)
			{
				$param = '';
				$path = $this->loginPath;
			}

			header("Location: {$path}.php{$param}");
		}
	}

	public function login(string $username, string $password): ?User
	{
		$query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
		$query->execute([
			'username' => $username,
		]);
		$query->setFetchMode(PDO::FETCH_CLASS,User::class );
		$user = $query->fetch();
		if($user === false)
		{
			return null;
		}
		if(password_verify($password, $user->getPassword()))
		{
			if(session_status() === PHP_SESSION_NONE )
			{
				session_start();
			}
			$_SESSION['user'] = $user->getId();
			return $user;
		}
		return null;
	}

	public function user():?User
	{
		if(session_status() === PHP_SESSION_NONE )
		{
			session_start();
		}
		$id = $_SESSION['user'] ?? null;
		if($id === null)
		{
			return null;
		}
		$query = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
		$query->execute([
			'id' => $id,
		]);
		$query->setFetchMode(PDO::FETCH_CLASS,User::class );
		return $query->fetch()?:null;
	}

}