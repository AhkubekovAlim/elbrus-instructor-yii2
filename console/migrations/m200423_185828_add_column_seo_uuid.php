<?php

use yii\db\Migration;
use common\models\Content;
use common\models\Seo;

/**
 * Class m200423_185828_add_column_seo_uuid
 */
class m200423_185828_add_column_seo_uuid extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(Content::tableName(), 'seo_uuid', $this->string(36)->comment('Seo'));


        $this->createIndex(
            'idx-seo-uuid',
            Seo::tableName(),
            'uuid'
        );

        $this->createIndex(
            'idx-content-seo_uuid',
            Content::tableName(),
            'seo_uuid'
        );


        $this->addForeignKey(
            'fk-content-seo_uuid',
            Content::tableName(),
            'seo_uuid',
            Seo::tableName(),
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
            'idx-content-seo_uuid',
            Content::tableName()
        );
        $this->dropForeignKey(
            'fk-content-seo_uuid',
            Content::tableName()
        );
        $this->dropColumn(Content::tableName(), 'seo_uuid');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200423_185828_add_column_seo_uuid cannot be reverted.\n";

        return false;
    }
    */
}
