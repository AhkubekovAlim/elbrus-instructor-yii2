<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $parent_uuid
 * @property string $title
 * @property string|null $description
 * @property string $content_type_uuid
 *
 * @property ContentTypes $contentTypeUu
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'title', 'content_type_uuid'], 'required', 'message'=> 'Поле не может быть пустым'],
            [['description'], 'string'],
            [['uuid', 'parent_uuid', 'content_type_uuid', 'seo_uuid'], 'thamtech\uuid\validators\UuidValidator', "message" => 'Недопустимое значение для uuid'],
            [['title'], 'string', 'max' => 255, "message"=>'Кол-во символов не может быть более 255'],
            [['content_type_uuid'], 'exist',
                'skipOnError' => false,
                'targetClass' => ContentTypes::className(),
                'targetAttribute' => ['content_type_uuid' => 'uuid']
            ],
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
            'parent_uuid' => 'Родительский раздел',
            'title' => 'Название',
            'description' => 'Описание',
            'content_type_uuid' => 'Тип контента',
        ];
    }

    /**
     * Gets query for [[ContentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContentType()
    {
        return $this->hasOne(ContentTypes::className(), ['uuid' => 'content_type_uuid']);
    }

    public function getContentTypeByNN($nickname = ''){
        return ContentTypes::findOne(['nickname' => $nickname]);
    }

    /**
     * Gets query for [[ContentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeo()
    {
        return $this->hasOne(Seo::className(), ['uuid' => 'seo_uuid']);
    }
}
