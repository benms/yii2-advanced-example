<?php

use yii\db\Migration;

class m210621_211442_category_init extends Migration
{
    const CAT_TABLE = '{{%category}}';
    const FK_CATEGORY_TO_NEWS = 'fk_category_to_news';
    const NEWS_TABLE = '{{%news}}';
    const SET_NULL = 'SET NULL';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::CAT_TABLE, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(256)->notNull()->unique(),
            'title' => $this->string(256)->notNull(),
            'enabled' => $this->boolean()->notNull()->defaultValue(false),
        ], $tableOptions);

        $this->addForeignKey(self::FK_CATEGORY_TO_NEWS, self::NEWS_TABLE, 'category_id', self::CAT_TABLE, 'id', self::SET_NULL, self::SET_NULL);
    }

    public function down()
    {
        $this->dropForeignKey(self::FK_CATEGORY_TO_NEWS, self::NEWS_TABLE);
        $this->dropTable(self::CAT_TABLE);
    }
}
