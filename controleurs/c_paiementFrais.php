<?php
/**
 * Mise en paiement des frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    Anthony LODOVICI <anthony.lodovici@gmail.com>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
$monControleur = 'paiementFrais';
switch ($action) {
    case 'selectionnerVisiteursMois':
        $lesVisiteurs = $pdo->getLesVisiteursPaiementFichesFrais();
        $visiteurASelectionner = $lesVisiteurs[0][0];
        $lesMois = $pdo->getLesMoisDisponiblesPaiementFichesFrais($visiteurASelectionner);
        $lesCles = array_keys($lesMois);
        $moisASelectionner = $lesCles[0];
        include 'vues/v_listeVisiteursMois.php';
        break;
    case 'selectionnerVisiteur':
        $idLstVisiteur = filter_input(INPUT_GET, 'idLstVisiteur', FILTER_SANITIZE_STRING);
        $visiteurASelectionner = $idLstVisiteur;
        $lesVisiteurs = $pdo->getLesVisiteursPaiementFichesFrais();
        $lesMois = $pdo->getLesMoisDisponiblesPaiementFichesFrais($visiteurASelectionner);
        $lesCles = array_keys($lesMois);
        $moisASelectionner = $lesCles[0];
        include 'vues/v_listeVisiteursMois.php';
        break;
    case 'consulterFrais':
        $visiteurASelectionner = filter_input(INPUT_POST, 'lstVisiteurs', FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getLesVisiteursPaiementFichesFrais();
        $idVisiteur = $visiteurASelectionner;
        $lesMois = $pdo->getLesMoisDisponiblesPaiementFichesFrais($idVisiteur);
        $moisASelectionner = $leMois;
        include 'vues/v_listeVisiteursMois.php';
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = Utils::dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        $nbFraisHorsForfait = Utils::nbFraisHorsForfait($lesFraisHorsForfait);
        include 'vues/v_etatFicheFrais.php';
        include 'vues/v_majFraisForfait.php';
        if (count($lesFraisHorsForfait) > 0) {
            include 'vues/v_majFraisHorsForfait.php';
        }
        include 'vues/v_paiementFrais.php';
        break;
    case 'paiementFrais':
        $visiteurASelectionner = filter_input(INPUT_POST, 'hdLeVisiteur', FILTER_SANITIZE_STRING);
        $leMois = filter_input(INPUT_POST, 'hdLeMois', FILTER_SANITIZE_STRING);
        $etat = filter_input(INPUT_POST, 'hdEtat', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getLesVisiteursPaiementFichesFrais();
        $idVisiteur = $visiteurASelectionner;
        if ($etat == 'VA') {
            $nouvelEtat = 'MP';
        } elseif ($etat == 'MP') {
            $nouvelEtat = 'RB';
        }
        try {
            $pdo->majEtatFicheFrais($idVisiteur, $leMois, $nouvelEtat);
            if ($etat == 'VA') {
                Utils::ajouterSucces('La fiche de frais est mise en paiement.');
            } elseif ($etat == 'MP') {
                Utils::ajouterSucces('La fiche de frais est remboursée.');
            }
        } catch (Exception $e) {
            Utils::ajouterErreur($e->getMessage());
        }
        if (!Utils::estJourComprisDansIntervalle(date('d/m/Y'), 20, 20) && $etat == 'VA') {
            Utils::ajouterErreur(
                'La mise en paiement doit être faite au 20'
                . ' du mois suivant la saisie par les visiteurs !'
            );
        }
        $lesMois = $pdo->getLesMoisDisponiblesPaiementFichesFrais($idVisiteur);
        $moisASelectionner = $leMois;
        include 'vues/v_listeVisiteursMois.php';
        if (Utils::nbSucces() != 0) {
            include 'vues/v_succes.php';
        }
        if (Utils::nbErreurs() != 0) {
            include 'vues/v_erreurs.php';
        }
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $idEtat = $lesInfosFicheFrais['idEtat'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = Utils::dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include 'vues/v_etatFicheFrais.php';
        include 'vues/v_majFraisForfait.php';
        $nbFraisHorsForfait = Utils::nbFraisHorsForfait($lesFraisHorsForfait);
        if (count($lesFraisHorsForfait) > 0) {
            include 'vues/v_majFraisHorsForfait.php';
        }
        if ($idEtat == 'VA' || $idEtat == 'MP') {
            include 'vues/v_paiementFrais.php';
        }
        break;
}
