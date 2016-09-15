<div class="properties-listing spacer">
    <a href="#" class="pull-right viewall">Voir tous nos biens</a>
    <h2>Nos derniers biens</h2>
    <div id="new-properties">
        <ul class="rslides">
            <?php foreach ($biens as $bien): ?>
                <li data-thumb="<?= PATH_ADMIN.$bien->path; ?>">
                    <?= $this->Html->image($bien->path);?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>