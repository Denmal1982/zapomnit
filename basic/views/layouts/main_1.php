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
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="header">
    <div class="container">
        <nav class="navbar navbar-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">CROWDNOTES</a>
            </div>
            <div class="collapse navbar-collapse">
            <?php if(!Yii::$app->user->isGuest):?>
            <div class="btn-group">
                <a class="btn" href="<?=Yii::$app->urlManager->createUrl(['/profile/speaker']) ?>"><i title="Спикеры" class="fa fa-bullhorn fa-2x"></i></a>
                <a class="btn" href="<?=Yii::$app->urlManager->createUrl(['/profile/notes']) ?>"><i title="Заметки" class="fa fa-sticky-note  fa-2x"></i></a>
                <a class="btn" href="<?=Yii::$app->urlManager->createUrl(['/profile/event']) ?>"><i title="События" class="fa fa-calendar fa-2x"></i></a>
            </div>
            <?php endif;?>




                <ul class="nav navbar-right">
                    <?php if(!Yii::$app->user->isGuest):?>
                        <li class="dropdown">
                            <a href="#" id="profilemenu" data-toggle="dropdown"><img src="<?=Yii::getAlias('@web')?>/images/user.png" height="30"></a>

                            <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="profilemenu">
                                <li>
                                    <a href="<?=Yii::$app->urlManager->createUrl(['/profile']) ?>">профиль</a>
                                </li>
                                <li>
                                    <a href="<?=Yii::$app->urlManager->createUrl(['/profile/settings']) ?>">настройки</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?=Yii::$app->urlManager->createUrl(['/main/logout']) ?>" data-method="post" >выход</a>
                                </li>
                            </ul>
                        </li>
                    <?php else:?>
                        <li>
                            <a href="<?=Yii::$app->urlManager->createUrl(['/main/login']) ?>">Вход</a>
                        </li>
                    <?php endif;?>
                </ul>
            </div>

        </nav>


    </div>


</div>
<div class="content">

    <div class="container">
        <div class="content-inner">
            <?= $content ?>
        </div>

    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>