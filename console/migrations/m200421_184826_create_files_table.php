<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m200421_184826_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {;
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%files}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36),
            'path'=> $this->string(255)->notNull(),
            'extension'=> $this->string(255)->notNull(),
            'file_name' => $this->string(255)->notNull(),
        ], $tableOptions);


        $this->createIndex(
            'idx-files-uuid',
            'files',
            'uuid'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%files}}');
    }
}
