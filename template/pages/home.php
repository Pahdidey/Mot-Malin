<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php include(pages . 'notifs.php'); ?>

        <header>
            <h1>Mot Malin</h1>
        </header>

        <section id="joueur">

            <div id="partie">

                <?php if (!isset($_COOKIE["idPartieMotMalin"])) { ?>

                    <div class="flex buttons">
                        <div class="flex50">
                            <a href="#" class="button C3 center open-modal" data-modal="nouvelle-partie"><span class="material-icons">add_circle_outline</span>Créer une partie</a>
                        </div>
                        <div class="flex50">
                            <a href="#" class="button C4 center open-modal" data-modal="rejoindre-partie"><span class="material-icons">person_add</span>Rejoindre une partie</a>
                        </div>
                    </div>

                    <div class="modal" id="nouvelle-partie">
                        <div class="overlay"></div>
                        <div class="content">
                            <?php include(pages . 'nouvelle-partie.php'); ?>
                        </div>
                    </div>

                    <div class="modal" id="rejoindre-partie">
                        <div class="overlay"></div>
                        <div class="content">
                            <?php include(pages . 'rejoindre-partie.php'); ?>
                        </div>
                    </div>

                <?php } else { ?>

                    <?php
                        $recSQL = "SELECT etat FROM motmalin2_parties WHERE id = '{$_COOKIE["idPartieMotMalin"]}'";
                        $result = mysqli_query($link , $recSQL);
                        $ligne = mysqli_fetch_array($result);

                        if ($ligne['etat'] == "En cours") {
                    ?>
                        <div class="box" id="cartes">
                            <?php 
                                $recSQL2 = 
                                "SELECT 
                                motmalin2_cartes.nom_carte AS carteJoueur
                                FROM motmalin2_participants 
                                INNER JOIN motmalin2_cartes ON motmalin2_participants.main = motmalin2_cartes.id
                                WHERE motmalin2_cartes.id_partie = {$_COOKIE["idPartieMotMalin"]} AND motmalin2_participants.id = {$_COOKIE["idJoueurMotMalin"]}";
                                $result2 = mysqli_query($link , $recSQL2);
                                $ligne2 = mysqli_fetch_array($result2);

                                if (empty($ligne2['carteJoueur'])) {
                                    $carteEnMain = "Aucune";
                                } else {
                                    $carteEnMain = $ligne2['carteJoueur'];
                                }
                            ?>
                            <p>Carte en main : <strong class="bigger"><?php echo $carteEnMain; ?></strong></p>
                            <?php if (empty($ligne2['carteJoueur'])) { ?>
                                <div class="actions">
                                    <a href="index.php?page=pioche-carte" class="button add">Piocher une carte</a>
                                </div>
                            <?php } else { ?>
                                <div class="flex buttons">
                                    <div class="flex50">
                                        <a href="index.php?page=placer-carte&idjoueur=1" class="button center C4"><span class="material-icons">grade</span> Placer la carte</a>
                                    </div>
                                    <div class="flex50">
                                        <a href="index.php?page=defausser-carte&idjoueur=1" class="button center C2"><span class="material-icons">delete</span> Défausser la carte</a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>                

                    <div id="infos">
                        <div class="box">
                            <h2>Partie <span class="txt-init"><?php echo $_COOKIE['nomPartieMotMalin']; ?></span></h2>
                            <?php if ($ligne['etat'] == "En attente") { ?>
                                <p>Partagez le nom de la partie aux autres joueurs pour qu'ils puissent la rejoindre.</p>
                            <?php } else { ?>
                                <p>La partie <?php echo $_COOKIE['nomPartieMotMalin']; ?> est en cours.</p>
                            <?php } ?>
                            <?php include(pages . 'participants.php'); ?>
                        </div>
                        <?php if ($ligne['etat'] == "En attente") { ?>
                            <div class="actions center">
                                <a href="index.php?page=lancer-partie" class="button" id="lancer-partie">Lancer la partie</a>
                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>

            </div>

        </section>


        <?php include(incl . 'footer.php'); ?>

    </body>
</html>


