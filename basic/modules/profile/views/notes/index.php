<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заметки';
?>
<div class="notes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Notes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    Pjax::begin();    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        },
    ]) ?>
    Pjax::end();

    <style>
        .note{
            display: block;
            width: 300px;
            height: 260px;
        }
        .note-header{
            height: 20%;
            background: #8C8C4D;;
            border-width: 2px 2px 0px 2px;
            border-color: #8C8C4D;
            border-style: solid;
            border-radius: 10px 10px 0 0;
        }

        .note-body{
            height: 80%;
            background: linear-gradient(137deg, #FBFB7F 75%, #D4D441);
            border-width: 0 2px 2px 2px;
            border-color: #8C8C4D;
            border-style: solid;
            border-radius: 0px 0px 10px 10px;
            padding: 10px;
        }
        .note-date{
            text-align: right;
            color: #8C8C4D;
            font-style: italic;

        }


        .arrow_box {
            position: relative;
            background: #88b7d5;
            border: 4px solid #c2e1f5;
        }
        .arrow_box:after, .arrow_box:before {
            bottom: 100%;
            left: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .arrow_box:after {
            border-color: rgba(136, 183, 213, 0);
            border-bottom-color: #88b7d5;
            border-width: 30px;
            margin-left: -30px;
        }
        .arrow_box:before {
            border-color: rgba(194, 225, 245, 0);
            border-bottom-color: #c2e1f5;
            border-width: 36px;
            margin-left: -36px;
        }
    </style>

    <!--
    <style>
        body{
            font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif,Lucida Grande,Verdana,Tahoma;
        }
        .note{
            display: block;
            width: 300px;
            height: 260px;
            border: 2px solid #ADACB5;
            border-radius: 5px;
            padding: 10px;

        }
        .note-header{
            height: 20%;
            text-transform: uppercase;
        }
        .note-body{
            height: 80%;
        }
    </style>-->
    <div class="note">
        <div class="note-header">
            <div class="">
            прогноз
            </div>
        </div>
        <div class="note-body">
            <div class="note-date"><?=date("Y-m-d")?></div>
            <div>
                Чтобы точно позиционировать цвета в градиенте, после значения цвета указывается его положение в процентах, пикселах или других единицах.
            </div>
        </div>
    </div>



</div>


