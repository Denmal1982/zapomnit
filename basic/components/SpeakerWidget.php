<?php

namespace app\components;
/**
 * Created by PhpStorm.
 * User: Den4ik
 * Date: 17.12.2015
 * Time: 21:58
 */
class SpeakerWidget extends \yii\base\Widget
{

    public $model;

    public function init()
    {
        parent::init();

    }


    public function run()
    {
        return $this->render('speaker',[
            'model'=>$this->model
        ]);
    }

}