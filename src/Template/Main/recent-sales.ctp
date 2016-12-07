<?php if (iterator_count($recentSales)): ?>
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
                                        <?= $this->Html->image('/img/biens/thumbnails/' . $bien->images[0]->name, ["class" => "img-responsive"]); ?>
                                    <?php else: ?>
                                        <?= $this->Html->image('/img/template/default-house.png', ["class" => "img-responsive"]); ?>
                                    <?php endif ?>

                                    <div class="status sold">Vendu</div>
                                </div>
                                <h4 style="color:#666;"><?= $bien->title ?></h4>

                                <p class="price"><?= $bien->price; ?> €</p>

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
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>