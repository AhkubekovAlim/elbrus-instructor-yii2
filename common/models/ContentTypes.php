<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content_types".
 *
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property string $nickname
 */
class ContentTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'title', 'nickname'], 'required', 'message'=> 'Поле не может быть пустым'],
            [['uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['title', 'nickname'], 'string', 'max' => 100, "message"=>'Кол-во символов не может быть более 100'],
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
            'title' => 'Название',
            'nickname' => 'Nickname',
        ];
    }
}
