<?php
	$pseudo = $_POST['pseudo-c'];
	$niveau = $_POST['niveau'];

	if (!empty($_POST)) {
		if (!empty($pseudo)) {
			$chaine = 'abcdefghijklmnopqrstuvwxyz';
	        $chaine .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
			$chaine .= '1234567890';
			$code = '';

			for ($i=0; $i < 5; $i++) { 
				$code .= substr($chaine,rand()%(strlen($chaine)),1); 
			}

			$recSQL2 = "INSERT INTO motmalin2_parties (nom, etat, niveau) VALUES ('{$code}', 'En attente', '{$niveau}')";
			$result2 = mysqli_query($link , $recSQL2);

			$recSQL3 = "SELECT id FROM motmalin2_parties WHERE nom = '{$code}'";
			$result3 = mysqli_query($link , $recSQL3);
			$ligne3 = mysqli_fetch_array($result3);

			$idPartie = $ligne3['id'];

			$recSQL4 = "INSERT INTO motmalin2_participants (nom, id_partie) VALUES ('{$pseudo}', {$idPartie})";
			$result4 = mysqli_query($link , $recSQL4);

			$recSQL5 = "SELECT id FROM motmalin2_participants WHERE nom = '{$pseudo}' AND id_partie = {$idPartie}";
			$result5 = mysqli_query($link , $recSQL5);
			$ligne5 = mysqli_fetch_array($result5);


			$_SESSION['niveauPartieMotMalin'] = $niveau;
			$_SESSION["partie"] = "nouvelle";

			setcookie("idJoueurMotMalin", $ligne5['id'], strtotime('+30 days'));
			setcookie("pseudoJoueurMotMalin", $pseudo, strtotime('+30 days'));

			setcookie("idPartieMotMalin", $idPartie, strtotime('+30 days'));
			setcookie("nomPartieMotMalin", $code, strtotime('+30 days'));

			mysqli_free_result($result2);
			mysqli_free_result($result3);
			mysqli_free_result($result4);
			mysqli_free_result($result5);
			mysqli_close($link);

			header('location:index.php?page=home');
		}
	}
?>