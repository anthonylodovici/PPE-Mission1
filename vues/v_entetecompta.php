<?php

/**
 * Vue Validation Fiche de Frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Anthony LODOVICI <anthony.lodovici@gmail.com>
*/
?>
<div class="col-md-8">
                        <ul class="nav nav-pills pull-right" role="tablist">
                            <li <?php if (!$uc || $uc == 'accueil') { ?>class="active" <?php } ?>>
                                <a href="index.php">
                                    
                                    Accueil
                                </a>
                            </li>
                            <li <?php if ($uc == 'validfrais') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=validFrais&action=validerFraisCompta">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    Valider les fiches de frais
                                </a>
                            </li>
                            <li <?php if ($uc == 'etatFrais') { ?>class="active"<?php } ?>>
                                <a href="index.php?uc=etatFrais&action=selectionnerMois">
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