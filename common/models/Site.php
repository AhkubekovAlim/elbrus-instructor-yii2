<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property int $id
 * @property string $uuid
 * @property string $title
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'title'], 'required', 'message'=> 'Поле не может быть пустым'],
            [['uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['title'], 'string', 'max' => 255, "message"=>'Кол-во символов не может быть более 255'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uuid' => 'Uuid',
            'title' => 'Название сайте',
        ];
    }
}
