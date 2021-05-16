<?php
	$recSQL = "SELECT etat FROM motmalin2_parties WHERE id = {$_COOKIE["idPartieMotMalin"]}";

    $result = mysqli_query($link , $recSQL);
    $ligne = mysqli_fetch_array($result);

    echo $ligne['etat'];

	mysqli_free_result($result);
	mysqli_close($link);
?>