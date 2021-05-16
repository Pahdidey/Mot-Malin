<?php
	$pseudo = $_POST['pseudo-r'];
	$nom = $_POST['nom-partie'];

	if (!empty($_POST)) {
		if ((!empty($pseudo)) && (!empty($nom))) {
			$recSQL3 = "SELECT id, niveau FROM motmalin2_parties WHERE nom = '{$nom}'";
			$result3 = mysqli_query($link , $recSQL3);
			$ligne3 = mysqli_fetch_array($result3);

			$idPartie = $ligne3['id'];
			$niveau = $ligne3['niveau'];

			if (empty($idPartie)) {
				$_SESSION["partie"] = "inconnue";
			} else {
				$recSQL4 = "INSERT INTO motmalin2_participants (nom, id_partie) VALUES ('{$pseudo}', {$idPartie})";
				$result4 = mysqli_query($link , $recSQL4);

				$recSQL5 = "SELECT id FROM motmalin2_participants WHERE nom = '{$pseudo}' AND id_partie = {$idPartie}";
				$result5 = mysqli_query($link , $recSQL5);
				$ligne5 = mysqli_fetch_array($result5);

				$_SESSION['niveauPartieMotMalin'] = $niveau;
				$_SESSION["partie"] = "rejointe";

				setcookie("idJoueurMotMalin", $ligne5['id'], strtotime('+30 days'));
				setcookie("pseudoJoueurMotMalin", $pseudo, strtotime('+30 days'));

				setcookie("idPartieMotMalin", $idPartie, strtotime('+30 days'));
				setcookie("nomPartieMotMalin", $nom, strtotime('+30 days'));
			}
		} else {
			echo "Test 3";
		}

		header('location:index.php?page=home');
	}
	
?>
