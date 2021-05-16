<?php


	// CONNEXION BDD

	function bdConnexion () {
        $link = mysqli_connect("localhost" , "root" , "root" , "jeudistance");
        mysqli_set_charset($link , 'utf8');

        return $link;
    }



    // ACTIONS BDD

    function findById ($table,$id,$field) {
		$SQL = "SELECT $field FROM $table WHERE id = $id";
		return $SQL;
	}

	function findAll ($field,$table,$where) {
		$SQL = "SELECT $field FROM $table WHERE $where";
		return $SQL;
	}

	function findAllDesc ($field,$table,$where) {
		$SQL = "SELECT $field FROM $table WHERE $where ORDER BY id DESC";
		return $SQL;
	}

	function updateById ($table,$field,$data,$id) {
		$SQL = "UPDATE $table SET $field = '$data' WHERE id = $id";
		return $SQL;
	}


	function insertArt ($table,$titre,$contenu) {
		$SQL = "INSERT INTO $table (titre,contenu,datecrea) VALUES ('$titre' , '$contenu', CURDATE())";
		return $SQL;
	}

	function deleteById ($table,$id) {
		$SQL = "DELETE FROM $table WHERE id = $id";
		return $SQL;
	}

	function executeQuery ($SQL) {
		global $link;
		$result = mysqli_query($link , $SQL);
		return $result;
	}


?>