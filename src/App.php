<?php
namespace App;

use PDO;

class App {

	public static $pdo;
	public static $auth;

	public static function  getPDO(): PDO
	{
		if(!self::$pdo)
		{
			self::$pdo = new PDO('sqlite:../data.sqlite', null,null, [
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			]);
		}

		return self::$pdo;
	}

	public static function getAuth():Auth
	{
		if(!self::$auth)
		{
			self::$auth = new Auth(self::getPDO(),'login','index');
		}
		return self::$auth;
	}
}