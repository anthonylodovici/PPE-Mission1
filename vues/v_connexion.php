<link rel="bootstrap" href="bootstrap.css" />
<?php
/**
 * Vue Connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Identification utilisateur</h3>
            </div>
            <div class="panel-body">
                <!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#visiteur" data-toggle="tab">Visiteur</a></li>
        <li><a href="#comptable" data-toggle="tab">Comptable</a></li>
</ul>
                <div class="tab-content">
            <div id= "visiteur" class="tab-pane fade in active">
                <form role="form" method="post"
                      action="index.php?uc=connexion&action=valideconnexion">
                    <fieldset>
                        <input class="form-control" name="type" type="hidden" value="1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input class="form-control" placeholder="Login"
                                       name="login" type="text" maxlength="45">
                            </div>
                                </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input class="form-control"
                                       placeholder="Mot de passe" name="mdp"
                                       type="password" maxlength="45">
                            </div>
                        </div>
                        <input class="btn btn-lg btn-success btn-block"
                               type="submit" value="Se connecter">
                    </fieldset>
                </form>
            </div>
                               <div id= "comptable" class="tab-pane fade"> 
                                   <form role="form" method="post"
                      action="index.php?uc=connexion&action=valideconnexion">
                    <fieldset>
                        <input class="form-control" name="type" type="hidden" value="2">
                                            </fieldset>

            </div>
        </div>
    </div>
</div>
    </div>
