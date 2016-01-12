<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;
use Imagine;


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $imageHash;

    public function rules()
    {
        return [
            [['imageFile'],
                'file' ,
                'checkExtensionByMimeType' => false,
                'extensions'  =>  [ 'gif' ,  'jpg' ,  'png' ,  'jpeg' ,  'JPG' ,  'JPEG' ,  'PNG' ,  'GIF' ]
            ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            $this->imageHash = Yii::$app->security->generateRandomString(20).'.'.$this->imageFile->extension;

            $path = 'uploads/' . $this->imageHash;

            $this->imageFile->saveAs($path);
            return true;
        } else {
            return false;
        }
    }
}