<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $speaker_id
 * @property string $date_start
 * @property string $date_finish
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'speaker_id', 'date_start', 'date_finish'], 'required'],
            [['title', 'content'], 'string'],
            [['speaker_id'], 'integer'],
            [['date_start', 'date_finish'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'speaker_id' => 'Speaker ID',
            'date_start' => 'Date Start',
            'date_finish' => 'Date Finish',
        ];
    }


}
