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

        $this->createTable('type_Avto', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('type_Avto', [
            'type' => 'ЛЕГКОВОЙ',
        ]);
        $this->insert('type_Avto', [
            'type' => 'ГРУЗОВОЙ',
        ]);


        $this->createTable('type_Kyzov', [
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
            $this->insert('type_Kyzov', [
                'type' => $type,
            ]);
        }

        $this->createTable('type_Dvigatel', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('type_Dvigatel', [
            'type' => 'БЕНЗИНОВЫЙ',
        ]);
        $this->insert('type_Dvigatel', [
            'type' => 'ДИЗЕЛЬНЫЙ',
        ]);


        $this->createTable('Tkpp', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('Tkpp', [
            'type' => 'МЕХАНИКА',
        ]);
        $this->insert('Tkpp', [
            'type' => 'АВТОМАТ',
        ]);

        $this->createTable('Tevakyator', [
            'id' => $this->primaryKey(),
            'type' => $this->string(),
        ]);

        $this->insert('Tevakyator', [
            'type' => 'ДА',
        ]);
        $this->insert('Tevakyator', [
            'type' => 'НЕТ',
        ]);




        /* Теблица  */
        $this->createTable('Avto', [
            'id' => $this->primaryKey(),
            'typeAvto' => $this->integer(),
            'modelAvto' => $this->string(),
            'year' => $this->integer(),
            'typeKyzov' => $this->integer(),
            'modelDvigatel' => $this->string(),
            'typeDvigatel' => $this->integer(),
            'kpp' => $this->integer(),
            'sostoyanie' => $this->text(),
            'summ' => $this->integer(),
            'city' => $this->string(),
            'name' => $this->string(),
            'telephone' => $this->string(),
            'email' => $this->string(),
            'evakyator' => $this->integer(),
            'imageFiles' => $this->string(),
        ]);

        $this->addForeignKey(
                'fk-Avto-type_Avto', 'Avto', 'typeAvto', 'type_Avto', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-Avto-type_Kyzov', 'Avto', 'typeKyzov', 'type_Kyzov', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-Avto-type_Dvigatel', 'Avto', 'typeDvigatel', 'type_Dvigatel', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-Avto-Tkpp', 'Avto', 'kpp', 'Tkpp', 'id', 'CASCADE'
        );
        $this->addForeignKey(
                'fk-Avto-Tevakyator', 'Avto', 'evakyator', 'Tevakyator', 'id', 'CASCADE'
        );
    }

}
