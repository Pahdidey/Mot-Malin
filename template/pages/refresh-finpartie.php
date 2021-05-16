<?php
	$recSQL = "SELECT COUNT(*) AS total FROM motmalin2_cartes WHERE id_partie = {$_COOKIE["idPartieMotMalin"]} AND resultat IS NULL";
    $result = mysqli_query($link , $recSQL);
    $ligne = mysqli_fetch_array($result);

    $recSQL2 = "SELECT etat FROM motmalin2_parties WHERE id = {$_COOKIE["idPartieMotMalin"]}";
	$result2 = mysqli_query($link , $recSQL2);
	$ligne2 = mysqli_fetch_array($result2);

	if ($ligne2['etat'] == "En cours") {
		if ($ligne['total'] == 0) {
			echo "fin";
		}
	} 

	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_close($link);
?>