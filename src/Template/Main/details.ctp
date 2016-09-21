<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="##">Accueil</a> / Acheter</span>
        <h2>Acheter</h2>
    </div>
</div>

<div class="container">
    <div class="properties-listing spacer normal">

        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">

                <div class="hot-properties hidden-xs">
                    <h4>Biens similaires</h4>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p> </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-5"><img src="/img/template/default-house.png" class="img-responsive img-circle" alt="properties"></div>
                        <div class="col-lg-6 col-sm-7">
                            <h5><a href="#">Integer sed porta quam</a></h5>
                            <p class="price">200 000€</p> </div>
                    </div>


                </div>

            </div>

            <div class="col-lg-9 col-sm-8 ">

                <h2><?= $bien->title ?></h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators hidden-xs">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                    <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                                </ol>
                                <div class="carousel-inner">
                                    <!-- Item 1 -->
                                    <div class="item active">
                                        <img src="/img/template/default-house.png" class="properties" alt="properties">
                                    </div>
                                    <!-- #Item 1 -->

                                    <!-- Item 2 -->
                                    <div class="item">
                                        <img src="/img/template/default-house.png" class="properties" alt="properties">

                                    </div>
                                    <!-- #Item 2 -->

                                    <!-- Item 3 -->
                                    <div class="item">
                                        <img src="/img/template/default-house.png" class="properties" alt="properties">
                                    </div>
                                    <!-- #Item 3 -->

                                    <!-- Item 4 -->
                                    <div class="item">
                                        <img src="/img/template/default-house.png" class="properties" alt="properties">

                                    </div>
                                    <!-- # Item 4 -->
                                </div>
                                <a class="left carousel-control" href="##myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <a class="right carousel-control" href="##myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                            <!-- #Slider Ends -->

                        </div>




                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Description</h4>
                            <?= $bien->description ?>

                        </div>
                        <div class="share">
                            Partager cette annonce sur : <img src="images/facebook-logo-button.png"> <img src="images/twitter-logo-button.png">
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price"><?= $bien->price ?> €</p>
                                <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?= $bien->town->title ?></p>

                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Agent à contacter
                                    <p><?= $bien->agent->first_name.' '.$bien->agent->last_name ?><br>0235742076</p>
                                </div>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> Prestations</h6>
                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="BedRoom"><?= $bien->room ?></span>
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Shower"><?= $bien->shower ?></span>
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?= $bien->parking ?></span>
                                <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?= $bien->kitchen ?></span>
                            </div>

                            <h6><span class="glyphicon glyphicon-home"></span> DPE</h6>
                            <img src="images/dpe.png">

                        </div>
                        <div class="col-lg-12 col-sm-6 ">
                            <div class="enquiry">
                                <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Full Name">
                                    <input type="text" class="form-control" placeholder="you@yourdomain.com">
                                    <input type="text" class="form-control" placeholder="your number">
                                    <textarea rows="6" class="form-control" placeholder="Whats on your mind?"></textarea>
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