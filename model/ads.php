<?php 
	/**
	* 
	*/
	class Ads {
		function __construct() {
			$this->mysqli = new mysqli(DB::get_host(), DB::get_user(), DB::get_pass(), DB::get_db());
			
			if ($this->get_post())
				$this->add();
		}
		private function get_post() {
			if (isset($_POST["title"])) 
				$this->title=$_POST["title"];
			else 
				return false;

			if (isset($_POST["description"])) 
				$this->description=$_POST["description"];
			else
				return false;

			return true;
		}
		private function add() {
			if ($this->title=="") return;
			if ($this->description=="") return;
			$ref=$_SESSION["user"]["id"];
			$query="INSERT INTO `social`.`ads`  VALUES (null, '$this->title', '$this->description', '$ref')";
			if (!$this->mysqli->query($query))
				echo "Falló la creación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
			else 
				header("location: /");
		}
		public function get_array() {
			$query="select ads.id as id, name, surname, username, title, description from users inner join ads on users.id=ads.id_user";
			$row="";
			$row2="";
			$i=0;
			if ($resultado=$this->mysqli->query($query)){
				while ($fila = $resultado->fetch_assoc()) {
					$name=$fila["name"]." ".$fila["surname"];
			        $row[$i]=['id' => $fila["id"],
			        		  'name' => $name,
			        		  'username' => $fila["username"],
			        		  'title' => $fila["title"],
			        		  'description' => $fila["description"]];
			        $i++;
			    }
			    if ($i>0)
				    for ($i=0; $i<count($row) ; $i++) { 
				    	$row2[$i]=$row[count($row)-$i-1];
				    	
				    }
			    return $row2;
			}
		}
		public function view($id) {
			$query="select name, surname, username, title, description from users inner join ads on users.id=ads.id_user and ads.id=$id";
			$row="";
			$row2="";
			$i=0;
			if ($resultado=$this->mysqli->query($query)){
				while ($fila = $resultado->fetch_assoc()) {
					$name=$fila["name"]." ".$fila["surname"];
			        $row[$i]=['name' => $name,
			        		  'username' => $fila["username"],
			        		  'title' => $fila["title"],
			        		  'description' => $fila["description"]];
			        $i++;

			    }
			    for ($i=0; $i<count($row) ; $i++) { 
			    	$row2[$i]=$row[count($row)-$i-1];
			    	
			    }
			    return $row2;
			}
		}
		private $mysqli, $title, $description;
	}
?>