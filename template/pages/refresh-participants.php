<?php

	$id = $_GET['id'];

	if ($id != "") {

		$recSQL3 = "SELECT etat FROM motmalin2_parties WHERE id = {$_COOKIE["idPartieMotMalin"]}";

        $result3 = mysqli_query($link , $recSQL3);
        $ligne3 = mysqli_fetch_array($result3);

        if ($ligne3['etat'] == "En attente") {

			$idParts = explode("-", $id);
			$nbEntrees = count($idParts);

			$x = 0;
			$selectParts = "";
		            
		    while($x < $nbEntrees){
		    	$selectParts .= "motmalin2_participants.id != " . $idParts[$x] . " AND ";
		        $x++;
		    }

		    $selectParts = substr($selectParts, 0, -5);


		    $recSQL = 
		    "SELECT 
		    motmalin2_participants.nom AS nomJoueur,
	        motmalin2_participants.id AS idJoueur

	        FROM motmalin2_participants

	        INNER JOIN motmalin2_parties ON motmalin2_participants.id_partie = motmalin2_parties.id

		    WHERE {$selectParts} AND motmalin2_parties.id = '{$_COOKIE["idPartieMotMalin"]}'";

		    $result = mysqli_query($link , $recSQL);

		    $messages = "";

		    while ($ligne = mysqli_fetch_array($result)) {
		        $messages .= "<li id='" . $ligne['idJoueur'] . "'>" . $ligne['nomJoueur'] . "</li>";
		    }

		    echo $messages;

		    mysqli_free_result($result);
		    mysqli_close($link);

		} elseif ($ligne3['etat'] == "En cours") {
			echo "En cours";
		}

	}
?>