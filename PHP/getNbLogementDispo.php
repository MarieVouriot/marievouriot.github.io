<?php

include "./cnx.php";
$rqt = $cnx->prepare("SELECT COUNT(idLog) as nbLog FROM logement GROUP BY estDisponnible HAVING estDisponnible = 1;");
$rqt->execute();


foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{ 
    echo "<strong>Nombre de logements disponibles : ". $ligne['nbLog'] ."</strong>";
}
?>