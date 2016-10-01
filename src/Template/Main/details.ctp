<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="##">Accueil</a> / Acheter</span>
        <h2>Acheter</h2>
    </div>
</div>

<div class="container">
    <div class="properties-listing spacer normal">

        <div class="row">
            <div class="col-lg-4 col-sm-5 hidden-xs">

                <div class="hot-properties hidden-xs">
                    <h4>Biens similaires</h4>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png"
                                                            class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png"
                                                            class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png"
                                                            class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png"
                                                            class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png"
                                                            class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p></div>
                    </div>


                </div>

            </div>

            <div class="col-lg-8 col-sm-7 ">

                <h2><?= $bien->title ?> (<?= $bien->m2 ?>m2) </h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide">
                                <?php
                                foreach ($imagesBiens as $imgBien): ?>
                                    <?php $img = $imgBien['_matchingData']['Images']; ?>
                                    <?= '<div><span class="detail-slider-img" style="background-image:url(\''.PATH_ADMIN.'/img/biens/' . $img['name'].'\');"></span></div>'; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- #Slider Ends -->

                        </div>


                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Description</h4>
                            <?= $bien->description ?>

                        </div>
                        <div class="share">
                            Partager cette annonce sur : <img src="images/facebook-logo-button.png"> <img
                                src="images/twitter-logo-button.png">
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price"><?= $bien->price ?> €</p>
                                <p class="area"><span
                                        class="glyphicon glyphicon-map-marker"></span> <?= $bien->town->title ?></p>

                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Agent à contacter
                                    <p><?= $bien->agent->first_name . ' ' . $bien->agent->last_name ?><br>0235742076</p>
                                </div>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> Prestations</h6>
                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="BedRoom"><?= $bien->room ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Shower"><?= $bien->shower ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Parking"><?= $bien->parking ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Kitchen"><?= $bien->kitchen ?></span>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> DPE</h6>
                            <div class="dpe">
                                <span class="indice <?= strtolower($bien->dpe->title) ?>"><div class="arrow-left"></div>
                                    <?= $bien->dpeValue ?></span>
                                <img src="<?= PATH_ADMIN ?>/img/template/dpe.png">
                            </div>

                        </div>
                        <div class="col-lg-12 col-sm-6 ">

                            <div class="enquiry">
                                <h6><span class="glyphicon glyphicon-envelope"></span> Envoyer un message à <?= $bien->agent->first_name . ' ' . $bien->agent->last_name ?></h6>
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                    <input type="text" class="form-control" placeholder="you@yourdomain.com">
                                    <input type="text" class="form-control" placeholder="your number">
                                    <textarea rows="6" class="form-control"
                                              placeholder="Whats on your mind?"></textarea>
                                    <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#myCarousel').lightSlider({
        item:1,
        loop:false,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
            {
                breakpoint:800,
                settings: {
                    item:1,
                    slideMove:1,
                    slideMargin:6
                }
            },
            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                }
            }
        ]
    });
</script>