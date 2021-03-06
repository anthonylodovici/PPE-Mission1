<?php
/**
 * Vue Entête comptables
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Anthony LODOVICI <anthony.lodovici@gmail.com>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title> 
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./styles/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="./styles/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);
            ?>
            <div class="header">
                <div class="row vertical-align">
                    <div class="col-md-4">
                        <h1>
                            <img src="./images/logo.jpg" class="img-responsive" 
                                 alt="Laboratoire Galaxy-Swiss Bourdin" 
                                 title="Laboratoire Galaxy-Swiss Bourdin">
                        </h1>
                    </div>
                      <link href="./styles/bootstrap/bootstrap2.css" rel="stylesheet">
                            <div class="col-md-8">
                        <ul class="nav nav-pills pull-right" role="tablist">
                            <li <?php if (!$uc || $uc == 'accueil') { ?>class= active" <?php } ?>>
                                <a href="index.php">
                                    
                                    Accueil
                                </a>
                            </li>
                            <li <?php if ($uc == 'validFrais') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=validerFrais&action=selectionnerVisiteursMois" class="text-warning">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Validation des fiches de frais
                                </a>
                            </li>
                            <li <?php if ($uc == 'etatFrais') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=paiementFrais&action=selectionnerVisiteursMois">
                                    <span class="glyphicon glyphicon-euro"></span>
                                    Suivre le paiement des fiches de frais
                                </a>
                            </li>
                            <li 
                            <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                             <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                <span class="glyphicon glyphicon-log-out"></span>
                                Déconnexion
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
