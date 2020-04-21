<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%content}}`.
 */
class m200419_113100_create_content_table extends Migration
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
        $this->createTable('{{%content}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull(),
            'parent_uuid'=> $this->char(36),
            'title'=> $this->string(255)->notNull(),
            'description' => $this->text(),
            'content_type_uuid'=> $this->char(36)->notNull()
        ], $tableOptions);

        $this->createIndex(
            'idx-content-content_type_uuid',
            'content',
            'content_type_uuid'
        );

        $this->addForeignKey(
            'fk-content-content_type_uuid',
            'content',
            'content_type_uuid',
            'content_types',
            'uuid',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-content-content_type_uuid',
            'content'
        );
        $this->dropForeignKey(
            'fk-content-content_types_uuid',
            'content'
        );
        $this->dropTable('{{%content}}');
    }
}
