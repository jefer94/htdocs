<?php 
	/**
	* 
	*/
	class Comments {
		function __construct() {
			$this->mysqli = new mysqli(DB::get_host(), DB::get_user(), DB::get_pass(), DB::get_db());
			if ($this->get_post())
				$this->add();
		}
		private function get_post() {
			if (isset($_POST["comment"])) {
				$this->comment=$_POST["comment"];
				return true;
			}
			return false;
		}
		private function add() {
			global $router;
			if ($this->comment=="") return;
			$ref=$_SESSION["user"]["id"];
			$ad=iconv_substr( $router , 4, 11,'utf-8' );
			$query="INSERT INTO `social`.`comments`  VALUES (null, '$this->comment', '$ref', '$ad')";
			if (!$this->mysqli->query($query))
				echo "Falló la creación: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
		}
		/*public function get_array() {
			$query="select comments.id as id, name, surname, username, comment from users inner join comments on users.id=comments.id_user";
			$row="";
			$row2="";
			$i=0;
			if ($resultado=$this->mysqli->query($query)){
				while ($fila = $resultado->fetch_assoc()) {
					$name=$fila["name"]." ".$fila["surname"];
			        $row[$i]=['id' => $fila["id"],
			        		  'name' => $name,
			        		  'username' => $fila["username"],
			        		  'comment' => $fila["comment"]];
			        $i++;
			    }
			    for ($i=0; $i<count($row) ; $i++) { 
			    	$row2[$i]=$row[count($row)-$i-1];
			    	
			    }
			    return $row2;
			}
		}*/
		public function get_array($ad) {
			$query="select comments.id_ad as id, name, surname, username, comment from users inner join comments on users.id=comments.id_user and comments.id_ad=$ad";
			$row="";
			$row2="";
			$i=0;
			if ($resultado=$this->mysqli->query($query)){
				while ($fila = $resultado->fetch_assoc()) {
					$name=$fila["name"]." ".$fila["surname"];
			        $row[$i]=['id' => $fila["id"],
			        		  'name' => $name,
			        		  'username' => $fila["username"],
			        		  'comment' => $fila["comment"]];
			        $i++;
			    }
			    if ($i>0)
				    for ($i=0; $i<count($row) ; $i++) { 
				    	$row2[$i]=$row[count($row)-$i-1];
				    	
				    }
			    return $row2;
			}
		}
		private $mysqli, $comment;
	}
?>