<?php

class Database{
	public static function connect(){
		$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

