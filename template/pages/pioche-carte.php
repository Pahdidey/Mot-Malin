<?php
	$recSQL = "SELECT * FROM motmalin2_cartes WHERE id_partie = {$_COOKIE["idPartieMotMalin"]} AND etat = 'Disponible'";
	$result = mysqli_query($link , $recSQL);

	$cartesDispo = array();

	while ($ligne = mysqli_fetch_array($result)) {
		$cartesDispo[] = $ligne['id'];
	}

	if (!empty($cartesDispo)) {
		$max = count($cartesDispo) - 1;
		$nbAuHasard = mt_rand(0, $max);

		echo $nbAuHasard;

		echo "<br>";

		echo $cartesDispo[$nbAuHasard];

		$recSQL4 = "UPDATE motmalin2_cartes SET etat = 'En main' WHERE id = {$cartesDispo[$nbAuHasard]}";
		$result4 = mysqli_query($link , $recSQL4);

		$recSQL5 = "UPDATE motmalin2_participants SET main = {$cartesDispo[$nbAuHasard]} WHERE id = {$_COOKIE["idJoueurMotMalin"]}";
		$result5 = mysqli_query($link , $recSQL5);
	}



	mysqli_free_result($result);
	mysqli_free_result($result4);
	mysqli_free_result($result5);
	mysqli_close($link);

    header('location:index.php?page=home');
   
?>