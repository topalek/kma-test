<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use app\common\AdminMenu;
use hail812\adminlte\widgets\Menu;
use hail812\adminlte3\assets\FontAwesomeAsset;
use yii\helpers\Html;

FontAwesomeAsset::register($this);
AppAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
$this->registerCssFile('https://fonts.googleapis.com/css?family=Quicksand:500,700');

$assetDir = Yii::getAlias('@web/files/assets');
?>
<?php
$this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href="<?= $assetDir ?>/images/favicon.ico" type='image/x-icon'>
    <?php
    $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->head() ?>
</head>
<body>
<?php
$this->beginBody() ?>

<div id='pcoded' class='pcoded'>
    <div class='pcoded-overlay-box'></div>
    <div class='pcoded-container navbar-wrapper'>
        <?= $this->render('navbar') ?>
        <div class='pcoded-main-container'>
            <div class='pcoded-wrapper'>
                <?= $this->render('sidebar') ?>

                <?= $this->render('content', ['content' => $content]) ?>
                <!-- [ style Customizer ] start -->
                <div id='styleSelector'>
                </div>
                <!-- [ style Customizer ] end -->
            </div>
        </div>
    </div>

    <?php
    $this->endBody() ?>
</body>
</html>
<?php
$this->endPage() ?>
