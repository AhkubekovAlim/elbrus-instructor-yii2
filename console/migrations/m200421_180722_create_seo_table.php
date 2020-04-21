<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%seo}}`.
 */
class m200421_180722_create_seo_table extends Migration
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
        $this->createTable('{{%seo}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull(),
            'title'=> $this->string(100),
            'description' => $this->text(),
            'keywords'=> $this->text()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%seo}}');
    }
}
