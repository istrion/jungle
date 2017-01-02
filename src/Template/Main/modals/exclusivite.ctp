<!-- Modal -->
<div class="modal fade" id="loginpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Exclusivités</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form role="form" action="" method="post" id="exclu">
                        <p>Inscrivez vous aux ventes en avant première et profitez avant les autres des nouveautés exclusives et pas encore diffusées sur le marché.</p>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-md-6">
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
                                <button class="btn btn-success btn-lg pull-right" type="submit">Envoyer</button>
                            </div>
                        </div>
                    </form>
                    <div id="msg-exclu">
                        <p class="text-bold">Merci. <br />
                            Maintenant vous allez avoir une longueur d'avance sur les autres ! <br />
                            On vous appelle au plus vite !
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