<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Jungle immobilier';
?>
<!DOCTYPE html>
<html lang="fr" class=" js no-touch csstransforms3d csstransitions">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Realestate Bootstrap Theme </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style(1).css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/lightslider.css">
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
    <script src="js/lightslider.js"></script>

    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Element('../Main/header') ?>

    <ul id="slider">
        <li data-thumb="img/slider/loft.jpg">
            <img src="img/slider/loft.jpg" />
        </li>
        <li data-thumb="img/slider/loft.jpg">
            <img src="img/slider/loft.jpg" />
        </li>
    </ul>

<script type="text/javascript">
    $(document).ready(function() {
        $('#slider').lightSlider({
            gallery:true,
            item:1,
            mode: 'fade',
            loop:true,
            thumbItem:9,
            enableDrag: false,
            currentPagerPosition:'center',
            adaptiveHeight:true,
            adaptiveWidth:true,

            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#slider'
                });
            }
        });
    });
</script>
</body>
</html>
