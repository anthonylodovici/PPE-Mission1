<?php
$action = filter_input(INPUT_REQUEST, action);
$idVisiteur = $_SESSION["id"];
switch ($action) {
    case'selectionnermois': {
            $lesmoisc = $pdo->getLesMoisDisponibles($idVisiteur);
            include("vues/v_listeMois.php");
        }
}
?>
