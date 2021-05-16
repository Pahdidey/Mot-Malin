<!DOCTYPE html>
<html lang="fr">
    <?php include(incl . 'head.php'); ?>
        
    <body>

        <?php include(pages . 'notifs.php'); ?>

        <header>
            <h1>Erreur&nbsp;!</h1>
        </header>

        <section>
            <div class="box">
                <p>Cette page n'existe pas</p>
            </div>
            <div class="actions center">
                <a href="index.php?page=home" class="button close">Revenir à l'accueil</a>
            </div>
        </section>

        <?php include(incl . 'footer.php'); ?>

    </body>
</html>