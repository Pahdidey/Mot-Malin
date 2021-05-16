<h1>Créer une partie</h1>

<form action="index.php?page=action-nouvelle-partie" method="POST">

	<div>
		<label for='pseudo-c'>Votre pseudo</label>
		<input type="text" id="pseudo-c" name="pseudo-c" required />
	</div>

    <div>
        <label for='niveau'>Niveau du jeu</label>
        <select name="niveau" id="niveau">
        	<option value="Express">Express (grille 3x3)</option>
		    <option value="Classique">Classique (grille 4x4)</option>						    
		    <option value="Expert">Expert (grille 5x5)</option>
		</select>
    </div>

    <button type="submit" id="button">Créer la partie</button>
</form>