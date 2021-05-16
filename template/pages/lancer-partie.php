<?php
    $recSQL = "SELECT * FROM motmalin2_parties WHERE id = '{$_COOKIE["idPartieMotMalin"]}'";
    $result = mysqli_query($link , $recSQL);
    $ligne = mysqli_fetch_array($result);

    if ($ligne['etat'] == "En attente") {
        if ($ligne['niveau'] == "Express") {         
            $recSQL2 =
            "INSERT INTO motmalin2_cartes (nom_carte, id_partie, etat) VALUES
            ('A1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible')";
        } elseif ($ligne['niveau'] == "Classique") {
            $recSQL2 =
            "INSERT INTO motmalin2_cartes (nom_carte, id_partie, etat) VALUES
            ('A1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible')";
        } else {
            $recSQL2 =
            "INSERT INTO motmalin2_cartes (nom_carte, id_partie, etat) VALUES
            ('A1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('A5', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('B5', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('C5', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('D5', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('E1', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('E2', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('E3', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('E4', {$_COOKIE["idPartieMotMalin"]}, 'Disponible'),
            ('E5', {$_COOKIE["idPartieMotMalin"]}, 'Disponible')";
        }
        $result2 = mysqli_query($link , $recSQL2);

        $recSQL3 = "UPDATE motmalin2_parties SET etat = 'En cours' WHERE id = {$_COOKIE["idPartieMotMalin"]}";
        $result3 = mysqli_query($link , $recSQL3);

        $_SESSION["partie"] = "lancee";
    } else if ($ligne['etat'] == "En cours") {
        $_SESSION["partie"] = "dejaencours";      
    } else if ($ligne['etat'] == "Terminée") {
        $_SESSION["partie"] = "terminee";
    }

    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_free_result($result3);

    mysqli_close($link);
    header('location:index.php?page=home');
?>