<!-- Modal -->
<div class="modal fade" id="addBien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Déposer votre bien</h4>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="stepwizard">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                <p>Etape 1</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                <p>Etape 2</p>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                <p>Etape 3</p>
                            </div>
                        </div>
                    </div>

                    <form role="form" action="" method="post">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <h3>Localisation de votre bien</h3>
                                    <div class="form-group">
                                        <label class="control-label">Ville</label>
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="town"  />
                                    </div>
                                    <div class="form-group">
                                        <label>Type de bien
                                            <select class="form-control" name="type-bien">
                                                <option value="Maison" /> Maison</option>
                                                <option value="Maison" /> Appartement</option>
                                                <option value="Immeuble" />Immeuble</option>
                                                <option value="Terrain" />Terrain</option>
                                                <option value="Proppriété" />Proppriété</option>
                                            </select>
                                        </label>
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Etape suivante</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                    <h3>Informations sur votre bien</h3>
                                    <div class="form-group">
                                        <label class="control-label">Nombre de pièces</label>
                                        <input maxlength="2" type="text" required="required" class="form-control" placeholder="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Surface ( m2)</label>
                                        <input maxlength="5" type="text" required="required" class="form-control"  />
                                    </div>
                                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Etape suivante</button>
                                </div>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-6 col-md-offset-3">
                                <div class="col-md-12">
                                        <h3>Vos coordonnées</h3>
                                        <div class="form-group">
                                            <label>Etat civil
                                                <select class="form-control" name="type-bien">
                                                    <option value="Mr" /> Mr</option>
                                                    <option value="Mme" /> Mme</option>
                                                    <option value="Mlle" />Mlle</option>
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Nom Prénom</label>
                                            <input maxlength="200" type="text" required="required" class="form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input maxlength="200" type="text" required="required" class="form-control"  />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Téléphone</label>
                                            <input maxlength="200" type="text" required="required" class="form-control"  />
                                        </div>
                                        <button class="btn btn-success btn-lg pull-right" type="submit">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
