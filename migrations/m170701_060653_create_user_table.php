<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170701_060653_create_user_table extends Migration {

    /**
     * @inheritdoc
     */
    public function safeUp() {
        /* Теблица Users */
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'pass' => $this->string()->notNull(),
            'admin' => $this->boolean()->notNull()->defaultValue(0),
        ]);


    }

    /**
     * @inheritdoc
     */
    public function safeDown() {

        $this->dropTable('commands');
    }

}
