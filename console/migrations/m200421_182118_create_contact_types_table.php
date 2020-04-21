<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_types}}`.
 */
class m200421_182118_create_contact_types_table extends Migration
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
        $this->createTable('{{%contact_types}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull()->unique(),
            'title'=> $this->string(100)->notNull(),
            'nickname' => $this->string(100)->notNull()->unique()
        ], $tableOptions);

        $this->createIndex(
            'idx-contact_types-uuid',
            'contact_types',
            'uuid'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_types}}');
    }
}
