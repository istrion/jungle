<?php if(count($testimonies)) :?>
<div class="temoignagnes">
    <div class="container">
        <h2>Témoignages</h2>
        <div class="row">
            <?php foreach ($testimonies as $testimony): ?>
            <div class="col-sm-3">
                <div class="parlent ">
                    <div class="txt"><?=$testimony->testimony;?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>