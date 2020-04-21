<?php

use yii\db\Migration;

/**
 * Class m200419_100513_add_content_type_table
 */
class m200419_100513_add_content_type_table extends Migration
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
        $this->createTable('{{%content_types}}', [
            'id' => $this->primaryKey(),
            'uuid'=> $this->char(36)->notNull()->unique(),
            'title'=> $this->string(100)->notNull(),
            'nickname' => $this->string(100)->notNull()->unique()
        ], $tableOptions);

        $this->createIndex(
            'idx-content_types-uuid',
            'content_types',
            'uuid'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content_types}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200419_100513_add_content_type_table cannot be reverted.\n";

        return false;
    }
    */
}
