<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT idLog, libelleAdr, villeAdr, estDisponnible, estMaison, prix, nbPiece, surfaceHabitable, objGestion, dateDispo FROM logement WHERE estDisponnible = 1;");
$rqt->execute();

foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $hasGarageRqt = $cnx->prepare("SELECT idGarage, surface, idLog FROM garage WHERE idLog = " . $ligne['idLog'] .";");
    $hasGarageRqt->execute();


    $estMaison = $ligne['estMaison'] == 0 ? 'Appartement' : 'Maison';
    echo "<div class='col-4 col-12-narrower'>
        <section class='box special'>
            <div class='column'>
            <span class='image featured'>";
    if ($estMaison == 'Appartement') {
        echo "<img src='images/appartement.jpg' alt='' />";
    }
    else {
        echo "<img src='images/maison.jpg' alt='' />";
    }

    if ($hasGarageRqt->rowCount() > 0) {
        echo "<div class='garage'>🚗 Avec garage 🚗</div>";
    }
    else {
        echo "<div class='garage'></div>";
    }

    echo "</span>
            <h4>" . $estMaison . " - <span>" . $ligne['surfaceHabitable'] . "m²</span> - <span style='color: red'>" . $ligne['prix'] . "€</span></h4>
            <p>" . $ligne['villeAdr']."</p>
            </div>
        </section>
    </div>";
}
?>