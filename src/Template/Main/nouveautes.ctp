<div class="properties-listing spacer">
    <a href="#" class="pull-right viewall">Voir tous nos biens</a>

    <h2>Nos derniers biens</h2>

    <div id="new-properties">
        <ul id="autoWidth" class="cs-hidden">
            <?php foreach ($biens as $bien): ?>
                <li>
                    <div class="properties">
                        <div class="image-holder">
                            <?= $this->Html->image(PATH_ADMIN . 'biens/' . $bien->images[0]->name, ["class" => "img-responsive"]); ?>
                            <div class="status sold">Sold</div>
                        </div>
                        <h4><a href="detail/<?= $bien->slug; ?>"><?= $bien->title ?></a></h4>

                        <p class="price"><?= $bien->price; ?> €</p>

                        <div class="listing-detail">
                            <span data-toggle="tooltip" data-placement="bottom"
                                  data-original-title="Bed Room"><?= $bien->room; ?></span>
                            <span
                                data-toggle="tooltip" data-placement="bottom"
                                data-original-title="Kitchen"><?= $bien->kitchen; ?></span>
                            <span data-toggle="tooltip" data-placement="bottom"
                                  data-original-title="Shower"><?= $bien->shower; ?></span>
                            <span data-toggle="tooltip" data-placement="bottom"
                                  data-original-title="Parking"><?= $bien->parking; ?></span>
                        </div>
                        <a class="btn btn-primary" href="#">Voir en détail</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>