<!-- Modal -->
<div class="modal fade" id="addBien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Estimer mon bien</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form role="form" action="" method="post" id="estimation">
                        <div class="row setup-content" id="step-1">
                            <div class="col-xs-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ou je me situe ?</label>
                                        <input maxlength="100" type="text" required="required" class="form-control"
                                               name="town"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Etat civil</label>
                                        <select class="form-control" name="civility">
                                            <option value="Mr"/>
                                            Mr</option>
                                            <option value="Mme"/>
                                            Mme</option>
                                            <option value="Mlle"/>
                                            Mlle</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Qu'est ce que je veux faire estimer ?</label>
                                        <select class="form-control" name="type-bien" required="required">
                                            <option value="Maison"/>
                                            Maison</option>
                                            <option value="Maison"/>
                                            Appartement</option>
                                            <option value="Immeuble"/>
                                            Immeuble</option>
                                            <option value="Terrain"/>
                                            Terrain</option>
                                            <option value="Proppriété"/>
                                            Proppriété</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Nom Prénom</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                               name="name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                               name="email"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Téléphone</label>
                                        <input maxlength="200" type="text" required="required" class="form-control"
                                               name="tel"/>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-lg pull-right" type="submit">Envoyer</button>
                            </div>
                        </div>
                    </form>
                    <div id="msg-estimation">
                        <p class="text-bold">Merci. <br/>
                            Nous nous engageons à vous rappeler au plus vite ! <br/>
                            Maintenant nous allons vous donner toutes les cartes en main pour vendre dans les
                            meilleurs delais et au meilleur prix.
                        </p>
                        <button class="btn btn-success btn-lg pull-right" data-dismiss="modal">Fermer</button>
                    </div>
                </div>


            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>