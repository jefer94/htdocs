<?php 
	/**
	* 
	*/
	class Users {
		function __construct() {
			$this->mysqli = new mysqli(DB::get_host(), DB::get_user(), DB::get_pass(), DB::get_db());
			$this->get_post();
			if (isset($this->username, $this->pass, $this->name, $this->surname, $this->email, $this->date))
				$this->register();
			else if (isset($this->username, $this->pass))
				$this->login();
		}
		private function get_post() {
			if (isset($_POST["username"]))
				$this->username=$_POST["username"];
			if (isset($_POST["pass"]))
				$this->pass=$_POST["pass"];
			if (isset($_POST["name"]))
				$this->name=$_POST["name"];
			if (isset($_POST["surname"]))
				$this->surname=$_POST["surname"];
			if (isset($_POST["email"]))
				$this->email=$_POST["email"];
			if (isset($_POST["date"]))
				$this->date=$_POST["date"];
		}
		private function register() {
			$now= date("Y-m-d");
			$query="INSERT INTO `social`.`users` VALUES (null, '$this->username', '$this->pass', '$this->name', '$this->surname', '$this->email', '$this->date', '$now')";
			if ($this->mysqli->query($query)) {
				header("location: /");
			}
			else {
				echo "Falló la creación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
			}
		}
		private function login() {
			$login=$this->mysqli->query("SELECT * FROM `users` WHERE username='$this->username' and pass='$this->pass' ");
			$row = mysqli_fetch_array($login);
			if ($row) {
				$_SESSION["user"]=['id' => $row["id"],
								   'username' => $row["username"],
								   'pass' => $row["pass"],
								   'name' => $row["name"],
								   'surname' => $row["surname"],
								   'email' => $row["email"],
								   'date' => $row["date"]];
				header("location: /");
			}
		}
		private $mysqli, $username, $pass, $name, $surname, $email, $date;
	}
?>