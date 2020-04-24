<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uuid_binds".
 *
 * @property int $id
 * @property string $uuid
 * @property string $uuid_bind
 */
class UuidBinds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uuid_binds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uuid', 'uuid_bind'], 'required'],
            [['uuid', 'uuid_bind'], 'string', 'max' => 36],
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
            'uuid_bind' => 'Uuid Bind',
        ];
    }
}
