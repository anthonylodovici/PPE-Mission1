<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idVisiteur = $_SESSION['id'];
$visiteurSelect = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING) ;
$mois = getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
    case'selectionnerVisiteur': {
            $lesVisiteurs = $pdo->getLesVisiteursDisponibles();
    $lesMois = $pdo->getLesMoisDisponibles($visiteurSelect);
    $leMois = filter_input(INPUT_POST, 'lstMoisCompta', FILTER_SANITIZE_STRING);
        $moisASelectionner = $leMois;
        $visiteurASelectionner= $visiteurSelect;
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteurSelect, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($visiteurSelect, $leMois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($visiteurSelect, $leMois);
    $nbJustificatifs = $pdo->getNbjustificatifs($visiteurSelect, $leMois);
    $numAnnee = substr($leMois, 0, 4);
    $numMois = substr($leMois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
            include("vues/v_listeVisiteurs.php");
    }
}
    require 'vues/v_listeFraisForfait.php';
require 'vues/v_listeFraisHorsForfait.php';