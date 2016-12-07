<div class="hot-properties hidden-xs">
    <h4>Biens similaires</h4>

    <?php foreach($identicalBiens as $identical): ?>
    <div class="row">
        <div class="col-lg-4 col-sm-3">
            <?php if(count($identical->images) > 0):
                    echo $this->Html->image('/img/biens/' . $identical->images[0]->name, ["class" => "img-responsive img-circle"]);
                        else:
                    echo $this->Html->image('/img/template/default-house.png', ["class" => "img-responsive img-circle"]);
                endif; ?>
        </div>
        <div class="col-lg-8 col-sm-9">
            <h5><a href="<?= PATH_ADMIN . '/details/' . $identical->slug ?>"><?= $identical->title ?></a></h5>
            <p class="price"><?= $identical->price ?> €</p></div>
    </div>
    <?php endforeach; ?>


</div>