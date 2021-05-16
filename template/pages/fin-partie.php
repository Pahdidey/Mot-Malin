<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <header>
            <h1>Partie terminée</h1>
        </header>

        <section>

            <div class="box">
            	<?php
            		$recSQL = "SELECT niveau, etat FROM motmalin2_parties WHERE id = {$_COOKIE["idPartieMotMalin"]}";
				    $result = mysqli_query($link , $recSQL);
				    $ligne = mysqli_fetch_array($result);

	            	$recSQL2 = "SELECT COUNT(*) AS total FROM motmalin2_cartes WHERE id_partie = {$_COOKIE["idPartieMotMalin"]} AND resultat = 'Placée'";
				    $result2 = mysqli_query($link , $recSQL2);
				    $ligne2 = mysqli_fetch_array($result2);

				    if ($ligne['niveau'] == "Express") {
				    	if ($ligne2['total'] < 4) {
				    		$resultat = "raté";
				    	} elseif ($ligne2['total'] > 3 AND $ligne2['total'] < 6) {
				    		$resultat = "moyen";
				    	} elseif ($ligne2['total'] > 5 AND $ligne2['total'] < 8) {
				    		$resultat = "bon";
				    	} elseif ($ligne2['total'] > 7) {
				    		$resultat = "exellent";
				    	}
				    } elseif ($ligne['niveau'] == "Classique") {
				    	if ($ligne2['total'] < 8) {
				    		$resultat = "raté";
				    	} elseif ($ligne2['total'] > 7 AND $ligne2['total'] < 13) {
				    		$resultat = "moyen";
				    	} elseif ($ligne2['total'] > 12 AND $ligne2['total'] < 15) {
				    		$resultat = "bon";
				    	} elseif ($ligne2['total'] > 14) {
				    		$resultat = "exellent";
				    	}
				    } else {
				    	if ($ligne2['total'] < 12) {
				    		$resultat = "raté";
				    	} elseif ($ligne2['total'] > 11 AND $ligne2['total'] < 17) {
				    		$resultat = "moyen";
				    	} elseif ($ligne2['total'] > 16 AND $ligne2['total'] < 23) {
				    		$resultat = "bon";
				    	} elseif ($ligne2['total'] > 22) {
				    		$resultat = "exellent";
				    	}
				    }
            	?> 

            	<?php if ($resultat == "raté") { ?>  
            		<h2>Résultat&nbsp;: Raté</h2>
            		<p class="error semibold"><?php echo $ligne2['total']; ?> cartes placées.</p>
            		<p>Oups, visiblement, vous ne vous êtes pas du tout compris.</p>
            	<?php } elseif ($resultat == "moyen") { ?>
            		<h2>Résultat&nbsp;: Moyen</h2>
            		<p class="warning semibold"><?php echo $ligne2['total']; ?> cartes placées.</p>
            		<p>Vous vous comprenez mieux, c'est un effort à prendre en compte&nbsp;!</p>
            	<?php } elseif ($resultat == "bon") { ?>
            		<h2>Résultat&nbsp;: Bon</h2>
            		<p class="success semibold"><?php echo $ligne2['total']; ?> cartes placées.</p>
            		<p>Une connexion commence à s'établir entre vous&nbsp;!</p>
            	<?php } elseif ($resultat == "exellent") { ?>
            		<h2>Résultat&nbsp;: Excellent</h2>
            		<p class="success semibold"><?php echo $ligne2['total']; ?> cartes placées.</p>
            		<p>Vous avez développé de véritables dons de télépathe&nbsp;!</p>
            	<?php } ?>
            </div>

            <?php
            	sleep(5);

            	if ($ligne['etat'] == "En cours") {
	            	$recSQL6 = "UPDATE motmalin2_parties SET etat = 'Terminée' WHERE id = {$_COOKIE["idPartieMotMalin"]}";
		        	$result6 = mysqli_query($link , $recSQL6);
	            }

	            setcookie("idJoueurMotMalin", "", time() - 3600);
	            setcookie("pseudoJoueurMotMalin", "", time() - 3600);
	            setcookie("idPartieMotMalin", "", time() - 3600);
	            setcookie("nomPartieMotMalin", "", time() - 3600);
	            
	            session_destroy();
		    ?>

            <div class="actions center">
                <a href="index.php?page=home" class="button close">Revenir à l'accueil</a>
            </div>

        </section>



        <?php include(incl . 'footer.php'); ?>

    </body>
</html>


