<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="<?=Yii::getAlias('@web')?>/bootstrap/css/bootstrap.min.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?php
        NavBar::begin([
            'brandLabel' => 'Коллективные заметки',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        if(Yii::$app->user->isGuest){
            $item = [
                ['label' => 'Регистрация', 'url' => ['/main/reg']],
                ['label' => 'Вход', 'url' => ['/main/login']]
            ];
        } else {
            $item = [
                [
                    'label' => '<i title="Спикеры" class="fa fa-bullhorn fa-2x"></i>',
                    'url' => ['/profile/speaker']
                ],
                [
                    'label' => '<i title="События" class="fa fa-calendar fa-2x"></i>',
                    'url' => ['/profile/event']
                ],
                [
                    'label' => '<i title="Заметки" class="fa fa-sticky-note  fa-2x"></i>',
                    'url' => ['/profile/event']
                ],
                [
                    'label' => 'Выход('.Yii::$app->user->identity->username.')',
                    'url' => ['/main/logout'],
                    'method' => 'post',
                    'linkOptions' => ['data-method'=>'post']
                ]
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'items' => $item,

        ]);
        NavBar::end();
        ?>
    </div>


    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
