<?php

namespace app\modules\traidavto\models;

use Yii;
use yii\db\Query;

class Traidavto extends \yii\db\ActiveRecord {

    /**
     * Тип автомобиля
     * @var string
     */
    public $typeAvto;

    /**
     * Модель автомобиля
     * @var string
     */
    public $modelAvto;

    /**
     * Год выпуска автомобиля
     * @var string
     */
    public $year;

    /**
     * Тип кузова
     * @var string
     */
    public $typeKyzov;

    public function rules() {
        return [
            [['modelAvto', 'year', 'typeDvigatel', 'kpp', 'city', 'name', 'telephone'], 'required'],
            [['sostoyanie'], 'string', 'length' => [2, 5000]],
            [['typeAvto', 'modelAvto', 'typeKyzov', 'modelDvigatel', 'typeDvigatel', 'kpp', 'city', 'name', 'telephone', 'evakyator', 'year'], 'string', 'max' => 100],
            [['summ'], 'integer',],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels() {
        return [
            'typeAvto' => 'Тип автомобиля:',
            'modelAvto' => 'Модель автомобиля:',
            'year' => 'Год выпуска автомобиля:',
            'typeKyzov' => 'Тип кузова:',
            'modelDvigatel' => 'Укажите двигатель:',
            'typeDvigatel' => 'Тип двигателя:',
            'kpp' => 'КПП:',
            'sostoyanie' => 'Состояние автомобиля:',
            'summ' => 'Хочу получить за автомобиль:',
            'city' => 'Населенный пункт:',
            'name' => 'Как Вас зовут?',
            'telephone' => 'Номер телефона:',
            'email' => 'Электронная почта:',
            'evakyator' => 'Нужна эвакуация?',
        ];
    }

    public static function typeKyzov() {
        return [
            0 => 'СЕДАН',
            1 => 'ХЭТЧБЕК',
            2 => 'УНИВЕРСАЛ',
            3 => 'ВНЕДОРОЖНИК',
            4 => 'КАБРИОЛЕТ',
            5 => 'КУПЕ',
            6 => 'ЛИМУЗИН',
            7 => 'МИНИВЭН',
            8 => 'ПИКАП',
            9 => 'ФУРГОН',
            10 => 'МИКРОАВТОБУС',
        ];
    }

    public static function year() {
        for ($i = 1980; $i <= date('Y'); $i++) {
            $year [$i] = $i;
        }
        return $year;
    }

}
