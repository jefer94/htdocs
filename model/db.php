<?php 
	/**
	* 
	*/
	abstract class DB {
		/*function __construct()*/ public static function init() {
			self::$host="localhost";
			self::$user="root";
			self::$pass="";
			self::$db="social";
		}
		/*function __construct($host, $user, $pass, $db) {
			$this->host=$host;
			$this->user=$user;
			$this->pass=$pass;
			$this->db=$db);
		}*/
		public static function get_host() {
			return self::$host;
		}
		public static function get_user() {
			return self::$user;	
		}
		public static function get_pass() {
			return self::$pass;
		}
		public static function get_db() {
			return self::$db;
		}
		private static $host, $user, $pass, $db;
	}
?>