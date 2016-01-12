<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use app\components\SpeakerWidget;


?>
<div class="speaker-index">

    <h1><?= Html::encode("Спикеры") ?></h1>

    <p>
        <?= Html::a('Добавить спикера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php foreach($dataProvider as $model){

    }

    ?>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return SpeakerWidget::widget([
                'model'=>$model
            ]);
        },
    ]) ?>

</div>
