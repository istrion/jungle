<div class="container">
    <div class="properties-listing spacer">
        <a href="<?= PATH_ADMIN ?>/liste/" class="pull-right viewall">Tout voir</a>

        <h2>Nos derniers biens</h2>

        <div id="new-properties">
            <ul id="autoWidth" class="cs-hidden">
                <?php foreach ($biens as $bien): ?>
                    <li>
                        <div class="properties">
                            <div class="image-holder">
                                <?php if (isset($bien->images[0])): ?>
                                    <?= $this->Html->image('/img/biens/thumbnails/' . $bien->images[0]->name, ["class" => "img-responsive"]); ?>
                                <?php else: ?>
                                    <?= $this->Html->image('/img/template/default-house.png', ["class" => "img-responsive"]); ?>
                                <?php endif ?>

                                <!--<div class="status sold">Sold</div>-->
                            </div>
                            <h4><a href="details/<?= $bien->slug; ?>"><?= $bien->title ?></a></h4>

                            <p class="price"><?= $this->Number->format($bien->price, ['locale' => 'fr_FR']); ?> €</p>

                            <div class="listing-detail">
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="BedRoom"><?= $bien->room; ?></span>

                                <?php if ($bien->type_of_bien == 2): ?>
                                    <span data-toggle="tooltip" data-placement="bottom"
                                          data-original-title="etage"><?= $bien->etage; ?>
                                </span>
                                    <?php else: ?>
                                    <span
                                        data-toggle="tooltip" data-placement="bottom"
                                        data-original-title="superficie"><?= $bien->m2; ?>m2</span>
                                <?php endif; ?>
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