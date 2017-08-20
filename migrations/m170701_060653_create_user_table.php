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

        $this->insert('users', [
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'pass' => '$2y$13$QSH6.rTkERorZCHIJFl6Cu1WXQLweHmQxFRUdgtN1OVRBSj5nCTuK',
            'admin' => 1,
        ]);

        $this->createIndex(
                'idx-users-name', 'users', 'name'
        );
        $this->createIndex(
                'idx-users-email', 'users', 'email'
        );

        /* Таблица Турниров */
        $this->createTable('tournament', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->defaultValue(null),
        ]);

        $this->createIndex(
                'idx-tournament-id', 'tournament', 'id'
        );

        /* Таблица матчей */
        $this->createTable('match', [
            'id' => $this->primaryKey(),
            'commanda' => $this->string()->notNull(),
            'commandb' => $this->string()->notNull(),
            'time' => $this->string()->notNull(),
            'gola' => $this->integer()->notNull()->defaultValue(0),
            'golb' => $this->integer()->notNull()->defaultValue(0),
            'id_tournament' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
                'idx-match-id_tournament', 'match', 'id_tournament'
        );
        $this->addForeignKey(
                'fk-match-id_tournament', 'match', 'id_tournament', 'tournament', 'id', 'CASCADE'
        );

        /* Таблица прогнозов */
        $this->createTable('prognosis', [
            'id' => $this->primaryKey(),
            'gola' => $this->integer()->notNull()->defaultValue(0),
            'golb' => $this->integer()->notNull()->defaultValue(0),
            'id_users' => $this->integer()->notNull(),
            'id_match' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
                'idx-prognosis-id_users', 'prognosis', 'id_users'
        );
        $this->createIndex(
                'idx-prognosis-id_match', 'prognosis', 'id_match'
        );
        $this->addForeignKey(
                'fk-prognosis-id_users', 'prognosis', 'id_users', 'users', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-prognosis-id_match', 'prognosis', 'id_match', 'match', 'id', 'CASCADE'
        );

        /* Таблица команды */
        $this->createTable('commands', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->defaultValue(0),
            'id_tournament' => $this->integer(),
        ]);
        $this->createIndex(
                'idx-commands-id', 'commands', 'id'
        );
        $this->insert('commands', [
            'name' => 'Зенит',
        ]);
        $this->insert('commands', [
            'name' => 'Спартак',
        ]);
        $this->insert('commands', [
            'name' => 'Челси',
        ]);
        $this->insert('commands', [
            'name' => 'ЦСК',
        ]);
        $this->insert('commands', [
            'name' => 'Динамо',
        ]);

        /* таблица многие ко многим commands - tournament */
        $this->createTable('commands', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->defaultValue(0),
            'id_tournament' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown() {
        /* Удаление таблицы Users */
        $this->delete('users', ['id' => 1]);
        $this->dropIndex(
                'idx-users-name', 'user'
        );
        $this->dropIndex(
                'idx-uses-email', 'email'
        );
        $this->dropTable('users');

        /* Удаление таблицы турниров */
        $this->dropIndex(
                'idx-tournament-id', 'tournament'
        );
        $this->dropTable('tournament');

        /* Удаление таблицы матчей */
        $this->dropForeignKey(
                'fk-match-id_tournament', 'match'
        );
        $this->dropIndex(
                'idx-match-id_tournament', 'match'
        );
        $this->dropTable('match');
        /* Удаление таблицы прогнозов */
        $this->dropForeignKey(
                'fk-prognosis-id_users', 'prognosis'
        );
        $this->dropForeignKey(
                'fk-prognosis-id_match', 'prognosis'
        );
        $this->dropIndex(
                'idx-prognosis-id_users', 'prognosis'
        );
        $this->dropIndex(
                'idx-prognosis-id_match', 'prognosis'
        );
        $this->dropTable('prognosis');

        /* Удаление таблицы комынды */
        $this->dropIndex(
                'idx-commands-id', 'commands'
        );
        $this->truncateTable('commands');
        $this->dropTable('commands');
    }

}
