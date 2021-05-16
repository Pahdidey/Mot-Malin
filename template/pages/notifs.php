<?php
    if ($_SESSION['partie'] != "") {
    	if ($_SESSION['partie'] == "nouvelle") {
	        echo "<div id='toast' class='success'>La partie {$_COOKIE['nomPartieMotMalin']} ({$_SESSION['niveauPartieMotMalin']}) a bien été créée.</div>";
	    } elseif ($_SESSION['partie'] == "inconnue") {
	        echo "<div id='toast' class='error'>La partie n'existe pas.</div>";
	    } elseif ($_SESSION['partie'] == "rejointe") {
	        echo "<div id='toast' class='success'>Vous avez rejoint la partie {$_COOKIE['nomPartieMotMalin']} ({$_SESSION['niveauPartieMotMalin']}).</div>";
	    } elseif ($_SESSION["partie"] == "lancee") {
	    	echo "<div id='toast' class='success'>La partie {$_COOKIE['nomPartieMotMalin']} vient de démarrer !</div>";
	    } elseif ($_SESSION["partie"] == "dejaencours") {
	    	echo "<div id='toast' class='error'>La partie {$_COOKIE['nomPartieMotMalin']} est déjà en cours.</div>";
	    } elseif ($_SESSION["partie"] == "terminee") {
	    	echo "<div id='toast' class='error'>La partie {$_COOKIE['nomPartieMotMalin']} est terminée.</div>";
	    }
        unset($_SESSION['partie']);
    }
?>
