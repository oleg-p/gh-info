<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gh_user}}`.
 */
class m210507_082601_create_gh_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('gh_user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
        ]);

        $this->createIndex('login', 'gh_user', 'login', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('gh_user');
    }
}
