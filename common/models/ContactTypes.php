<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_types".
 *
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property string $nickname
 *
 * @property Contacts[] $contacts
 */
class ContactTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_types';
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
            [['nickname'], 'unique'],
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

    /**
     * Gets query for [[Contacts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContacts()
    {
        return $this->hasMany(Contacts::className(), ['contact_type_uuid' => 'uuid']);
    }
}
