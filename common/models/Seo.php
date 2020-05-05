<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "seo".
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $title
 * @property string|null $description
 * @property string|null $keywords
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid'], 'required', 'message'=> 'Поле не может быть пустым'],
            [['description', 'keywords'], 'string'],
            [['uuid'], 'thamtech\uuid\validators\UuidValidator'],
            [['title'], 'string', 'max' => 100, "message"=>'Кол-во символов не может быть более 100'],
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
            'title' => 'Seo title',
            'description' => 'Seo description',
            'keywords' => 'Seo keywords',
        ];
    }
}
