<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT AVG(prix) as avgPrix FROM logement;");
$rqt->execute();

echo "<h3>Prix imbattable !</h3><br>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{ 
    echo "<span class='avgPrix'> En moyenne le prix d'un logement est de ". round($ligne['avgPrix']) ." €</span>";
}
?>