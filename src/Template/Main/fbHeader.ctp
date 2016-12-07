<?php if($pageName == 'details') :?>

    <?php
    if(count($bien->images) > 0) {
        $imgFB = $bien->images[0];
        $imgFB = PATH_ADMIN . '/img/biens/thumbnails/'.$imgFB->name;
    } else {
        $imgFB = PATH_ADMIN . '/img/template/default-house.png';
    }
    ?>


<!-- FB -->
<meta property="og:site_name" content="Jungle Immobilier" />
<meta property="og:locale" content="fr_FR" />
<link rel="image_src" href="<?= $imgFB ?>" />
<meta property="og:image" content="<?= $imgFB ?>" />
<meta property="og:title" content="<?= $bien->title ?>" />
<meta property="og:description" content="<?= strip_tags($bien->description) ?>" />
<meta property="og:type" content="cdssocial:product" />
<!-- /FB -->

<?php endif ?>