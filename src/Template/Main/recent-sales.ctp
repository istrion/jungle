<div class="container">
    <div class="properties-listing recent-sales spacer">
        <h2>Nos dernieres ventes</h2>

        <div id="recent-sales">
            <ul class="cs-hidden">
                <?php foreach ($recentSales as $bien): ?>
                    <li>
                        <div class="properties">
                            <div class="image-holder">
                                <?php if (isset($bien->images[0])): ?>
                                    <?= $this->Html->image('/img/biens/' . $bien->images[0]->name, ["class" => "img-responsive"]); ?>
                                <?php else: ?>
                                    <?= $this->Html->image('/img/template/default-house.png', ["class" => "img-responsive"]); ?>
                                <?php endif ?>

                                <div class="status sold">Vendu</div>
                            </div>
                            <h4><a href="details/<?= $bien->slug; ?>"><?= $bien->title ?></a></h4>

                            <p class="price"><?= $bien->price; ?> €</p>

                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="BedRoom"><?= $bien->room; ?></span> <span
                                    data-toggle="tooltip" data-placement="bottom"
                                    data-original-title="Kitchen"><?= $bien->kitchen; ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Shower"><?= $bien->shower; ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Parking"><?= $bien->parking; ?></span>
                            </div>
                            <a class="btn btn-primary" href="<?= PATH_ADMIN . '/details/' . $bien->slug ?>">Voir en
                                détail</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>