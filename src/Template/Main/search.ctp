<div class="banner-search">
    <div class="container">
        <!-- banner -->
        <h3>Acheter, Vendre &amp; Louer</h3>

        <div class="searchbar">
            <div class="row">
                <form action="<?= PATH_ADMIN ?>/liste/" method="get">
                    <div class="col-lg-6 col-sm-6">
                        <input type="text" name="town" class="form-control" placeholder="Lieu">
                        <input type="hidden" name="town_id" value="">

                        <div class="row">
                            <div class="col-lg-3 col-sm-3 ">
                                <select name="offer" class="form-control">
                                    <option value="1">Acheter</option>
                                    <option value="2">Louer</option>
                                    <option value="3">Viager</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select name="price" class="form-control">
                                    <option>Prix</option>
                                    <option value="150000">0 - 150,000</option>
                                    <option value="200000">150,000 - 200,000</option>
                                    <option value="250000">200,000 - 250,000</option>
                                    <option value="300000">250,000 - 300,000</option>
                                    <option value="max">300,000 - plus</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <select name="type_of_bien" class="form-control">
                                    <option>Type de bien</option>
                                    <option value="1">Maison</option>
                                    <option value="2">Appartement</option>
                                    <option value="3">Immeuble</option>
                                    <option value="4">Terrain</option>
                                    <option value="5">Propriété</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-sm-4">
                                <button class="btn btn-primary">Rechercher</button>
                            </div>
                        </div>


                    </div>
                </form>
                <div class="col-lg-5 col-sm-6 content-btn-popup">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <button class="btn btn-info" data-toggle="modal" data-target="#loginpop">Trouvez avant <br /> les autres !!</button>
                        </div>
                        <div class="col-md-6 text-center">
                            <button class="btn btn-info" data-toggle="modal" data-target="#addBien">
                                Éxigez le bon prix ! <br />
                               Faite estimer votre <br />bien en 3 clicks</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>