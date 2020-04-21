<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m200421_182556_create_contacts_table extends Migration
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
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull(),
            'title'=> $this->string(255)->notNull(),
            'nickname' => $this->string(100)->notNull()->unique(),
            'value' => $this->text()->notNull(),
            'contact_type_uuid'=> $this->char(36)->notNull()
        ], $tableOptions);

        $this->createIndex(
            'idx-contact-contact_type_uuid',
            'contacts',
            'contact_type_uuid'
        );


        $this->addForeignKey(
            'fk-contact-contact_type_uuid',
            'contacts',
            'contact_type_uuid',
            'contact_types',
            'uuid',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
