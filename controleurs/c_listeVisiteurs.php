<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idVisiteur = $_SESSION['id'];
$mois = getMois(date('d/m/Y'));
$numAnnee = substr($mois, 0, 4);
$numMois = substr($mois, 4, 2);
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$utilisateur_selectionne = filter_input(INPUT_POST, 'lstVisiteur',FILTER_SANITIZE_STRING);
switch ($action) {
    case'selectionnerVisiteur': {
            $lesVisiteurs = $pdo->getLesVisiteursDisponibles();
            include("vues/v_listeVisiteurs.php");
        }
    case'selectionnermois': {
            $lesMois = $pdo->getLesMoisDisponibles($utilisateur_selectionne);
            
        }
}


$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
$lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $mois);
$lesVisiteurs = $pdo->getLesVisiteursDisponibles();
$lesMois = $pdo->getLesMoisDisponibles($utilisateur_selectionne);
require 'vues/v_listeFraisForfait.php';
require 'vues/v_listeFraisHorsForfait.php';
