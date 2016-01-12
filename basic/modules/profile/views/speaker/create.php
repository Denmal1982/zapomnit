<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Speaker */

$this->title = 'Добавить спикера';
?>
<div class="speaker-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name2')->textInput(['maxlength' => true]) ?>

    <?=$form->field($icon, 'imageFile')->fileInput()?>

    <?= $form->field($model, 'about')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
