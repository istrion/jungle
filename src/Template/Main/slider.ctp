<ul id="slider" class="rslides">
    <?php foreach ($querySliders as $slider): ?>
        <li data-thumb="<?= $slider->path; ?>">
            <?= $this->Html->image($slider->path);?>
        </li>
    <?php endforeach; ?>
</ul>