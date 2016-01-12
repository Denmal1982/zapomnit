<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<div class="form-reg">
    <h2>Присоединиться</h2>
    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model,'username')->textInput(['placeholder'=>'Имя'])->label(false);?>

    <?=$form->field($model,'email')->textInput(['placeholder'=>'e-mail'])->label(false);?>

    <?=$form->field($model,'password')->passwordInput(['placeholder'=>'пароль'])->label(false);?>

    <div class="form-group">
        <div class="">
            <?=Html::submitButton('Регистрация',['class'=>'btn btn-default btn-block'])?>
        </div>

    </div>

    <?php $form->end(); ?>

</div>
