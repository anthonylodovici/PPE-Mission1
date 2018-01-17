<?php
/**
 * Vue liste visiteur
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    Anthony Lodovici <anthony.lodovici@gmail.com>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */?>
<div class="row">
    <div class="col-md-4">
        <h6><strong>Choisir le visiteur: </h6></strong>
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=listeVisit&action=selectionnerVisiteur" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n"></label>
                <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $visiteur = $unVisiteur['visiteur'];
                            ?>
                           <option selected value="<?php echo $id ?>"><?php echo $visiteur ?></option>
                        <?php
                    }
                    ?> 
                </select>
            </div>
        </form>
    </div>
</div>