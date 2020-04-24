<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $path
 * @property string $extension
 * @property string $file_name
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['path', 'extension', 'file_name'], 'required'],
            [['uuid'], 'string', 'max' => 36],
            [['path', 'extension', 'file_name'], 'string', 'max' => 255],
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
            'path' => 'Path',
            'extension' => 'Extension',
            'file_name' => 'File Name',
        ];
    }
}
