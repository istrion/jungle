<div class="container">
    <div class="properties-listing spacer">

        <div class="row">
            <div class="col-lg-3 col-sm-4 ">

                <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
                    <input type="text" class="form-control" placeholder="Search of Properties">

                    <div class="row">
                        <div class="col-lg-5">
                            <select class="form-control">
                                <option>Buy</option>
                                <option>Rent</option>
                                <option>Sale</option>
                            </select>
                        </div>
                        <div class="col-lg-7">
                            <select class="form-control">
                                <option>Price</option>
                                <option>$150,000 - $200,000</option>
                                <option>$200,000 - $250,000</option>
                                <option>$250,000 - $300,000</option>
                                <option>$300,000 - above</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control">
                                <option>Property Type</option>
                                <option>Apartment</option>
                                <option>Building</option>
                                <option>Office Space</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary">Find Now</button>

                </div>


                <div class="hot-properties hidden-xs">
                    <h4>Hot Properties</h4>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle"
                                                            alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>

                            <p class="price">$300,000</p></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle"
                                                            alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>

                            <p class="price">$300,000</p></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle"
                                                            alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>

                            <p class="price">$300,000</p></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle"
                                                            alt="properties"></div>
                        <div class="col-lg-8 col-sm-7">
                            <h5><a href="property-detail.php">Integer sed porta quam</a></h5>

                            <p class="price">$300,000</p></div>
                    </div>

                </div>


            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="sortby clearfix">
                    <div class="pull-left result">
                        <?= $this->Paginator->counter(
                        '{{end}} biens sur un total de 
                        {{count}}'
                        ); ?>
                    </div>
                    <div class="pull-right">
                        <?= $this->Form->create('',["type" => "get", "id" => "sortBy"]) ?>
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
                                    <?= $this->Html->image('/img/biens/' . $bien->images_bien->image->name, ["class" => "img-responsive"]); ?>
                                    <div class="status sold">Sold</div>
                                </div>
                                <h4><a href="#"><?= h($bien->title) ?></a></h4>

                                <p class="price"><?= $this->Number->format($bien->price) ?></p>

                                <div class="listing-detail">
                            <span data-toggle="tooltip" data-placement="bottom"
                                  data-original-title="BedRoom"><?= $bien->room; ?></span>
                                <span
                                    data-toggle="tooltip" data-placement="bottom"
                                    data-original-title="Kitchen"><?= $bien->kitchen; ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Shower"><?= $bien->shower; ?></span>
                                <span data-toggle="tooltip" data-placement="bottom"
                                      data-original-title="Parking"><?= $bien->parking; ?></span>
                                </div>
                                <a class="btn btn-primary" href="<?= PATH_ADMIN.'/details/'.$bien->slug?>">Voir les détails</a>
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
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#sortBy").change(function(){
       $(this).submit();
    });
</script>