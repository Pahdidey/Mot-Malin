<?php
	$recSQL = 
	"UPDATE 
	motmalin2_cartes 
	JOIN motmalin2_participants ON motmalin2_cartes.id = motmalin2_participants.main
	SET 
	motmalin2_cartes.resultat = 'Défaussée',
	motmalin2_cartes.etat = 'Non Disponible',
	motmalin2_participants.main = NULL
	WHERE motmalin2_participants.id = {$_COOKIE["idJoueurMotMalin"]}";
	$result = mysqli_query($link , $recSQL);

	header('location:index.php?page=home');  
?>