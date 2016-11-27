<?php if($pageName == 'details') :?>

    <?php
    if(iterator_count($imagesBiens)) {
        foreach ($imagesBiens as $imgBien) {
            $img = $imgBien['_matchingData']['Images'];
            $imgPath = PATH_ADMIN . '/img/biens/' . $img['name'];
            break;
        }
    } else {
        $imgPath = PATH_ADMIN . '/img/template/default-house.png';
    }
    ?>


<!-- FB -->
<meta property="og:site_name" content="Jungle Immobilier" />
<meta property="og:locale" content="fr_FR" />
<link rel="image_src" href="<?= $imgPath ?>" />
<meta property="og:image" content="<?= $imgPath ?>" />
<meta property="og:title" content="<?= $bien->title ?>" />
<meta property="og:description" content="<?= strip_tags($bien->description) ?>" />
<meta property="og:type" content="cdssocial:product" />
<!-- /FB -->

<?php endif ?>