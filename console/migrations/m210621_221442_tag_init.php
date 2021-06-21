<?php

use yii\db\Migration;

class m210621_221442_tag_init extends Migration
{
    const TAG_TABLE = '{{%tag}}';
    const TAG_TO_NEWS_TABLE = '{{%tag_to_news}}';
    const NEWS_TABLE = '{{%news}}';
    const TAG_ID = 'tag_id';
    const NEWS_ID = 'news_id';
    const FK_TAG_TO_NEWS_TAG = 'fk_tag_to_news_tag';
    const FK_TAG_TO_NEWS_NEWS = 'fk_tag_to_news_news';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TAG_TABLE, [
            'id' => $this->primaryKey(),
            'slug' => $this->string(256)->notNull()->unique(),
            'title' => $this->string(256)->notNull(),
        ], $tableOptions);

        $this->createTable(self::TAG_TO_NEWS_TABLE, [
            self::TAG_ID => $this->integer(),
            self::NEWS_ID => $this->integer(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_tag_to_news', self::TAG_TO_NEWS_TABLE, [self::TAG_ID, self::NEWS_ID]);
        $this->addForeignKey(self::FK_TAG_TO_NEWS_TAG, self::TAG_TO_NEWS_TABLE, self::TAG_ID, self::TAG_TABLE, 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(self::FK_TAG_TO_NEWS_NEWS, self::TAG_TO_NEWS_TABLE, self::NEWS_ID, self::NEWS_TABLE, 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey(self::FK_TAG_TO_NEWS_TAG, self::TAG_TO_NEWS_TABLE);
        $this->dropForeignKey(self::FK_TAG_TO_NEWS_NEWS, self::TAG_TO_NEWS_TABLE);
        $this->dropTable(self::TAG_TABLE);
        $this->dropTable(self::TAG_TO_NEWS_TABLE);
    }
}
