<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT DISTINCT villeAdr FROM logement;");
$rqt->execute();

echo "<h3>Présent dans ". $rqt->rowCount() ." villes</h3><br>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{ 
    echo "<span class='city'>";
    echo $ligne['villeAdr'];
    echo " </span>";
}
?>