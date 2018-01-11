<?php
/**
 * Vue Connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    Anthony Lodovici <h.bougattaya1212@gmail.com>
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
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active"><a  data-toggle="tab" href="#visiteur"><strong>Visiteur</strong></a></li>
                    <li ><a  data-toggle="tab" href="#comptable"><strong>Comptable</strong></a></li>
                </ul>
                <hr>
                <div class="tab-content">
                    <div id="visiteur" class="tab-pane fade in active">
                        <form role="form" method="post"
                              action="index.php?uc=connexion&action=valideConnexion">
                            <fieldset>
                                <input class="form-control" name="role" type="hidden" value="V">
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
                    <div id="comptable" class="tab-pane fade">
                        <form role="form" method="post"
                              action="index.php?uc=connexion&action=comptable">
                            <fieldset>
                                <input class="form-control" name="role" type="hidden" value="C">
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
                </div>
            </div>
        </div>
    </div>
</div>