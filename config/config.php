<?php

class Config {
	private static $config = array();
	
	static function setup() {
		self::$config["root"] = "/";
		self::$config["title"] = "Add your site title here";
	    self::$config["analytics"] = "";
	    self::$config["description"] = "";
		self::$config["author"] = "";
	}
	
	static function get($key) {
		return self::$config[$key];
	}
	
}

?>