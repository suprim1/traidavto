<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m170826_150653_create_traid_avto_table extends Migration {

    /**
     * @inheritdoc
     */
    public function safeUp() {

        $this->createTable('typeAvto', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('typeAvto', [
            'type' => 'ЛЕГКОВОЙ',
        ]);
        $this->insert('typeAvto', [
            'type' => 'ГРУЗОВОЙ',
        ]);


        $this->createTable('typeKyzov', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $typeKyzov = [
            'СЕДАН',
            'ХЭТЧБЕК',
            'УНИВЕРСАЛ',
            'ВНЕДОРОЖНИК',
            'КАБРИОЛЕТ',
            'КУПЕ',
            'ЛИМУЗИН',
            'МИНИВЭН',
            'ПИКАП',
            'ФУРГОН',
            'МИКРОАВТОБУС',
        ];

        foreach ($typeKyzov as $type) {
            $this->insert('typeKyzov', [
                'type' => $type,
            ]);
        }

        $this->createTable('typeDvigatel', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('typeDvigatel', [
            'type' => 'БЕНЗИНОВЫЙ',
        ]);
        $this->insert('typeDvigatel', [
            'type' => 'ДИЗЕЛЬНЫЙ',
        ]);


        $this->createTable('kpp', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('kpp', [
            'type' => 'МЕХАНИКА',
        ]);
        $this->insert('kpp', [
            'type' => 'АВТОМАТ',
        ]);

        $this->createTable('evakyator', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('evakyator', [
            'type' => 'ДА',
        ]);
        $this->insert('evakyator', [
            'type' => 'НЕТ',
        ]);




        /* Теблица  */
        $this->createTable('traidAvto', [
            'id' => $this->primaryKey(),
            'typeAvto' => $this->integer(),
            'modelAvto' => $this->string()->notNull(),
            'year' => $this->integer()->notNull(),
            'typeKyzov' => $this->integer(),
            'modelDvigatel' => $this->string(),
            'typeDvigatel' => $this->integer()->notNull(),
            'kpp' => $this->integer()->notNull(),
            'sostoyanie' => $this->text(),
            'summ' => $this->integer(),
            'city' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'telephone' => $this->string()->notNull(),
            'email' => $this->string(),
            'evakyator' => $this->integer(),
        ]);

        $this->addForeignKey(
                'fk-traidAvto-typeAvto', 'traidAvto', 'typeAvto', 'typeAvto', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-traidAvto-typeKyzov', 'traidAvto', 'typeKyzov', 'typeKyzov', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-traidAvto-typeDvigatel', 'traidAvto', 'typeDvigatel', 'typeDvigatel', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-traidAvto-kpp', 'traidAvto', 'kpp', 'kpp', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-traidAvto-evakyator', 'traidAvto', 'evakyator', 'evakyator', 'id', 'CASCADE'
        );
    }

}
