<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 ">

                <div class="search-form">
                    <h4><span class="glyphicon glyphicon-search"></span> Recherche</h4>
                    <form action="<?= PATH_ADMIN ?>/liste/" method="post">
                        <input type="text" name="sectors" class="form-control" placeholder="Lieu" data-toggle="modal"
                               data-target="#selectSectors" readonly="readonly" id="inputTownSelect"
                               value="<?= $sectors ?>">
                        <input type="hidden" name="sectors_id" value="<?= $sectors_id ?>">
                        <div class="row">
                            <div class="col-lg-5">
                                <select name="offer" class="form-control">
                                    <option value="1" <?= ($offer == 1) ? 'selected="selected"' : '' ?>>Acheter</option>
                                    <option value="2" <?= ($offer == 2) ? 'selected="selected"' : '' ?>>Louer</option>
                                    <option value="3" <?= ($offer == 3) ? 'selected="selected"' : '' ?>>Viager</option>
                                </select>
                            </div>
                            <div class="col-lg-7">
                                <select name="price" class="form-control">
                                    <option>Prix</option>
                                    <option value="150000" <?= ($price == 150000) ? 'selected="selected"' : '' ?>>0 -
                                        150,000
                                    </option>
                                    <option value="200000" <?= ($price == 200000) ? 'selected="selected"' : '' ?>>
                                        150,000 - 200,000
                                    </option>
                                    <option value="250000" <?= ($price == 250000) ? 'selected="selected"' : '' ?>>
                                        200,000 - 250,000
                                    </option>
                                    <option value="300000" <?= ($price == 300000) ? 'selected="selected"' : '' ?>>
                                        250,000 - 300,000
                                    </option>
                                    <option value="max" <?= ($price == 'MAX') ? 'selected="selected"' : '' ?>>300,000 -
                                        plus
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <select name="type_of_bien" class="form-control">
                                    <option>Type de bien</option>
                                    <option value="1" <?= ($type_of_bien == 1) ? 'selected="selected"' : '' ?>>Maison
                                    </option>
                                    <option value="2" <?= ($type_of_bien == 2) ? 'selected="selected"' : '' ?>>
                                        Appartement
                                    </option>
                                    <option value="3" <?= ($type_of_bien == 3) ? 'selected="selected"' : '' ?>>
                                        Immeuble
                                    </option>
                                    <option value="4" <?= ($type_of_bien == 4) ? 'selected="selected"' : '' ?>>Terrain
                                    </option>
                                    <option value="5" <?= ($type_of_bien == 5) ? 'selected="selected"' : '' ?>>
                                        Propriété
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary">Rechercher</button>
                    </form>
                </div>

            </div>

            <?php if (count($biens) > 0) : ?>

                <div class="col-lg-9 col-sm-8">
                    <div class="sortby clearfix">
                        <div class="pull-left result">
                            <?= $this->Paginator->counter(
                                '{{end}} biens sur un total de 
                        {{count}}'
                            ); ?>
                        </div>
                        <div class="pull-right">
                            <?= $this->Form->create('', ["type" => "get", "id" => "sortBy", "url" => PATH_ADMIN . $_SERVER["REQUEST_URI"]]) ?>
                            <input type="hidden" name="sectors_id" value="<?= $sectors_id ?>"/>
                            <input type="hidden" name="offer" value="<?= $offer ?>"/>
                            <input type="hidden" name="type_of_bien" value="<?= $type_of_bien ?>"/>
                            <input type="hidden" name="price" value="<?= $price ?>"/>
                            <select class="form-control" name="sortBy" id="sortBy">
                                <option value="0">Trier par</option>
                                <option value="asc">Du moins cher au plus cher</option>
                                <option value="desc">Du plus cher au moins cher</option>
                            </select>
                            <?= $this->Form->end() ?>

                        </div>

                    </div>
                    <div class="row">

                        <?php foreach ($biens as $bien): ?>
                            <!-- properties -->
                            <div class="col-lg-4 col-sm-6">
                                <div class="properties">
                                    <div class="image-holder">
                                        <a href="#" class="like"><?= $this->Html->image('/img/template/like.png') ?></a>
                                        <?= $this->Html->image('/img/biens/' . $bien->images_bien->image->name, ["class" => "img-responsive"]); ?>
                                    </div>
                                    <h4>
                                        <a href="<?= PATH_ADMIN . '/details/' . $bien->slug ?>"><?= h($bien->title) ?></a>
                                    </h4>

                                    <p class="price"><?= $this->Number->format($bien->price) ?></p>

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
                                    <a class="btn btn-primary" href="<?= PATH_ADMIN . '/details/' . $bien->slug ?>">Voir
                                        les
                                        détails</a>
                                </div>
                            </div>
                            <!-- properties -->
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <!-- Pagination -->
                        <div class="center">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('< ' . __('previous'), ['class' => 'paginate_button previous']) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >', ['class' => 'paginate_button_next']) ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php
                $term = '';
                switch ($offer) {
                    case 1:
                        $term = 'vendu';
                        break;
                    case 2:
                        $term = 'loué';
                        break;
                    case 3:
                        $term = 'vendu';
                        break;
                }
                ?>
                <p class="already-sold">Oups tout est déja <?= $term ?> !</p>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php echo $this->Html->script('/js/liste.js', ['block' => 'scriptBottom']); ?>
<?php echo $this->Html->script('/js/search.js', ['block' => 'scriptBottom']); ?>
