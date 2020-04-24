<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $uuid
 * @property string $title
 * @property string $nickname
 * @property string $value
 * @property string $contact_type_uuid
 *
 * @property ContactTypes $contactTypeUu
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'title', 'nickname', 'value', 'contact_type_uuid'], 'required', 'message'=> 'Поле не может быть пустым'],
            [['value'], 'string'],
            [['uuid', 'contact_type_uuid', 'contact_type_uuid'], 'thamtech\uuid\validators\UuidValidator', "message" => 'Недопустимое значение для uuid'],
            [['title'], 'string', 'max' => 255, "message"=>'Кол-во символов не может быть более 255'],
            [['nickname'], 'string', 'max' => 100, "message"=>'Кол-во символов не может быть более 100'],
            [['nickname'], 'unique'],
            [['contact_type_uuid'], 'exist',
                'skipOnError' => true,
                'targetClass' => ContactTypes::className(),
                'targetAttribute' => ['contact_type_uuid' => 'uuid']],
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
            'value' => 'Значение',
            'contact_type_uuid' => 'Тип контакта',
        ];
    }

    /**
     * Gets query for [[ContactTypeUu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContactTypeUu()
    {
        return $this->hasOne(ContactTypes::className(), ['uuid' => 'contact_type_uuid']);
    }
}
