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
    <title>Jungle immobilier</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->fetch('meta') ?>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/style.css">
    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/style(1).css">
    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/custom.css">
    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/slider.css">
    <link rel="stylesheet" href="<?= PATH_ADMIN ?>/css/lightslider.css">

    <?= $this->fetch('css') ?>
</head>
<body class="<?= $pageName ?>">
    <?= $this->Element('../Main/header') ?>
    <?= $this->fetch('content') ?>

    <script src="<?= PATH_ADMIN ?>/js/jquery-1.9.1.min.js"></script>
    <script src="<?= PATH_ADMIN ?>/js/bootstrap.js"></script>
    <script src="<?= PATH_ADMIN ?>/js/script.js"></script>
    <script src="<?= PATH_ADMIN ?>/js/slider.js"></script>
    <script src="<?= PATH_ADMIN ?>/js/lightslider.js"></script>

    <?= $this->fetch('script') ?>
    <?= $this->fetch('scriptBottom') ?>


</body>
</html>
