<?php
    $currentLink = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $offer = '';
    if($bien->offer == 1) $offer = 'Acheter';
    if($bien->offer == 2) $offer = 'Louer';
    if($bien->offer == 3) $offer = 'Viager';
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="inside-banner">
    <div class="container">
        <span class="pull-right"><a href="<?= PATH_ADMIN ?>">Accueil</a> / <?= $offer ?></span>
        <h2>
            <?= $offer ?>
        </h2>
    </div>
</div>

<div class="container">
    <div class="properties-listing spacer normal">

        <div class="row">
            <div class="col-lg-3 col-sm-4 hidden-xs">
                <?= $this->Element('../Main/identical-biens') ?>
            </div>

            <div class="col-lg-9 col-sm-8 ">

                <h2><?= $bien->title ?> (<?= $bien->m2 ?>m2) </h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="property-images">
                            <!-- Slider Starts -->
                            <div id="myCarousel" class="carousel slide">
                                <?php
                                foreach ($imagesBiens as $imgBien): ?>
                                    <?php $img = $imgBien['_matchingData']['Images']; ?>
                                    <?= '<div><a href="'.PATH_ADMIN.'/img/biens/' . $img['name'].'" data-lightbox="details"><span class="detail-slider-img" data-lightbox="image-1" style="background-image:url(\''.PATH_ADMIN.'/img/biens/' . $img['name'].'\');"></span></a></div>'; ?>
                                <?php endforeach; ?>
                            </div>
                            <!-- #Slider Ends -->

                        </div>


                        <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Description</h4>
                            <?= $bien->description ?>

                        </div>
                        <div class="share">
                            Partager cette annonce sur : <br />
                            <div class="fb-share-button"
                                 data-href="<?= $currentLink ?>"
                                 data-layout="button_count" data-size="large"
                                 data-mobile-iframe="false">
                                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Partager</a></div><br />
                            <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>

                    </div>
                    <div class="col-lg-4 color-white">
                        <div class="col-lg-12  col-sm-6">
                            <div class="property-info">
                                <p class="price"><?= $bien->price ?> €</p>
                                <p class="area"><span
                                        class="glyphicon glyphicon-map-marker"></span> <?= $bien->town->title ?></p>

                                <div class="profile">
                                    <span class="glyphicon glyphicon-user"></span> Contact
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
                                <?php if ($bien->type_of_bien == 2): ?>
                                    <span data-toggle="tooltip" data-placement="bottom"
                                          data-original-title="etage"><?= $bien->etage; ?>
                                </span>
                                <?php else: ?>
                                    <span
                                        data-toggle="tooltip" data-placement="bottom"
                                        data-original-title="superficie"><?= $bien->m2; ?>m2</span>
                                <?php endif; ?>
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
                                <h6><span class="glyphicon glyphicon-envelope"></span> Envoyer un message à </h6>
                                <div class="photo-agent text-center"><?= $this->Html->image('/img/agents/'.$bien->agent->photo) ?></div>
                                <div class="agent-name"><?= $bien->agent->first_name . ' ' . $bien->agent->last_name ?></div>
                                <form role="form">
                                    <input type="text" class="form-control" placeholder="Votre nom complet">
                                    <input type="text" class="form-control" placeholder="Email">
                                    <input type="text" class="form-control" placeholder="Téléphone">
                                    <textarea rows="6" class="form-control"
                                              placeholder="Message"></textarea>
                                    <button type="submit" class="btn btn-primary" name="Submit">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<?php echo $this->Html->script('/js/lightbox.js', ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('/js/details.js', ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->css('lightbox.min', array('block' => 'css')); ?>
