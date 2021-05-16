<?php
	$recSQL2 = "SELECT id, nom, main FROM motmalin2_participants WHERE id_partie = '{$_COOKIE["idPartieMotMalin"]}'";
    $result2 = mysqli_query($link , $recSQL2);
?>
<p><strong>Participants&nbsp;:</strong></p>
<ul class='collection' id='participants'>
	<?php 
		while ($ligne2 = mysqli_fetch_array($result2)) {
			if ($ligne2['main'] != NULL) {
	            $carteEnMain = "<span class='label'>1 carte en main</span>";
	        } else {
	            $carteEnMain = "";
	        }
	        echo "<li id='" . $ligne2['id'] . "'>" . $ligne2['nom'] . $carteEnMain . "</li>";
    	}
    ?>
</ul>

<?php
	mysqli_free_result($result2);
    mysqli_close($link);
?>
