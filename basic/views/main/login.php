<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="site-login">
    <h2>Войти</h2>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email')->textInput(['placeholder'=>'e-mail'])->label(false)?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'пароль'])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            //'template' => "<div class=\"\">{input} {label}</div>\n<div class=\"\">{error}</div>",
        ]) ?>


        <div class="form-group">
            <div class="">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    <hr>

    <?=Html::a('Регистрация', ['/main/reg'],['class'=>'btn btn-block btn-info'])?>

    </div>


