<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$action = filter_input(INPUT_REQUEST, action);
$idvisiteur = $_SESSION["id"];
switch ($action) {
    case'selectionnerVisiteur': {
            $lesVisiteurs = $pdo->getLesVisiteursDisponibles();
            include("vues/v_listeVisiteurs.php");
        }
}
