<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idVisiteur = $_SESSION['id'];
$utilisateur_selectionne = filter_input(INPUT_POST, 'lstVisiteur',FILTER_SANITIZE_STRING);
$mois = getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
switch ($action) {
    case'selectionnerVisiteur': {
            $lesVisiteurs = $pdo->getLesVisiteursDisponibles();
            include("vues/v_listeVisiteurs.php");
        }
    case'selectionnerMois':{
        
break;
    }
        case 'affDetail':
            $visiteur= filter_input(INPUT_POST,'lstVisiteur',FILTER_SANITIZE_STRING);
    $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
    $lesMois = $pdo->getLesMoisDisponibles($visiteur);
    $moisASelectionner = $leMois;
    include 'vues/v_listeVisiteurs.php';
    $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($visiteur, $leMois);
    $lesFraisForfait = $pdo->getLesFraisForfait($visiteur, $leMois);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($visiteur, $leMois);
    $numAnnee = substr($leMois, 0, 4);
    $numMois = substr($leMois, 4, 2);
    $libEtat = $lesInfosFicheFrais['libEtat'];
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $dateModif = dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
    break;
}


$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
$lesVisiteurs = $pdo->getLesVisiteursDisponibles();
$lesMois = $pdo->getLesMoisDisponibles($utilisateur_selectionne);
require 'vues/v_listeFraisForfait.php';
require 'vues/v_listeFraisHorsForfait.php';
