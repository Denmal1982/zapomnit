<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "speaker".
 *
 * @property integer $id
 * @property string $name0
 * @property string $name1
 * @property string $name2
 * @property string $create_at
 * @property string $update_at
 * @property string $about
 * @property string $image_hash
 *
 */
class Speaker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'speaker';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
                'value' => new Expression('now()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name0', 'name1'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['about'], 'string'],
            [['name0', 'name1', 'name2'], 'string', 'max' => 255],
            [['image_hash'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name0' => 'Имя',
            'name1' => 'Фамилия',
            'name2' => 'Отчество',
            'create_at' => 'Добавлен',
            'update_at' => 'Последнее обновление',
            'about' => 'Описание',
            'image_hash'=>'image_hash'
        ];
    }
}
