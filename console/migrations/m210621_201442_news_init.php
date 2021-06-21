<?php

use yii\db\Migration;

class m210621_201442_news_init extends Migration
{
    const NEWS_TABLE = '{{%news}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::NEWS_TABLE, [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'slug' => $this->string(256)->notNull()->unique(),
            'title' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),
            'enabled' => $this->boolean()->notNull()->defaultValue(false),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable(self::NEWS_TABLE);
    }
}
