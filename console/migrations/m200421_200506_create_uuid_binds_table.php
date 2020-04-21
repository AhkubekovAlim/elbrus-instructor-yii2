<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uuid_binds}}`.
 */
class m200421_200506_create_uuid_binds_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%uuid_binds}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull(),
            'uuid_bind'=> $this->char(36)->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'idx-uuid_binds-uuid',
            'uuid_binds',
            'uuid'
        );

        $this->createIndex(
            'idx-uuid_binds-uuid_bind',
            'uuid_binds',
            'uuid_bind'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uuid_binds}}');
    }
}
