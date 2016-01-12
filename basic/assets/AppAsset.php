<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/widget.css',
        'css/calendar.css',
        'css/style.css',
        //'css/site.css',
        'css/event.css',
        //'fonts/beermoney/beermoney.css',
        //'fonts/armanu/armanu.css',
        //'fonts/avdira/avdira.css',
        'awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'js/events.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_BEGIN];
}
