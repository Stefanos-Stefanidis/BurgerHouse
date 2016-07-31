<?php
namespace AppBundle\Entity;

class Pdo{
	$host = 'localhost';
	$base = 'stef_burger_db';
	$user = 'root';
	$pass = '';
	self::$connection = new \PDO("mysql:host=$host;dbname=$base", $user, $pass);
}