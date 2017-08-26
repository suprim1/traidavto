<?php

namespace app\modules\traidavto\models;

use Yii;
use yii\db\Query;

class Traidavto extends \yii\db\ActiveRecord {

    /**
     * Тип автомобиля
     * @var string
     */
    public $typeAvto = 0;

    /**
     * Модель автомобиля
     * @var string
     */
    public $modelAvto;

    /**
     * Год выпуска автомобиля
     * @var integer
     */
    public $year;

    /**
     * Тип кузова
     * @var integer
     */
    public $typeKyzov;

    /**
     * Модель двигателя
     * @var string
     */
    public $modelDvigatel;

    /**
     * Тип двигателя
     * @var integer
     */
    public $typeDvigatel = 0;

    /**
     * Коробка передач
     * @var integer
     */
    public $kpp = 0;

    /**
     * Состояние автомобиля
     * @var string
     */
    public $sostoyanie;

    /**
     * Хочу получить за автомобиль
     * @var integer
     */
    public $summ;

    /**
     * Населенный пункт
     * @var string
     */
    public $city;

    /**
     * Имя
     * @var string
     */
    public $name;

    /**
     * Номер телефона
     * @var string
     */
    public $telephone;

    /**
     * Электронная почта
     * @var string
     */
    public $email;

    /**
     * Нужна эвакуация
     * @var string
     */
    public $evakyator;

    public function rules() {
        return [
            [['modelAvto', 'year', 'typeDvigatel', 'kpp', 'city', 'name', 'telephone'], 'required'],
            [['sostoyanie'], 'string', 'length' => [2, 5000]],
            [['typeAvto', 'modelAvto', 'modelDvigatel', 'typeDvigatel', 'kpp', 'city', 'name', 'telephone', 'evakyator'], 'string', 'max' => 100],
            [['summ', 'year', 'typeKyzov'], 'integer',],
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

    public static function typeAvto() {
        return [
            0 => 'ЛЕГКОВОЙ',
            1 => 'ГРУЗОВОЙ',
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
        for ($i = date('Y'); $i >= 1980; $i--) {
            $year [$i] = $i;
        }
        return $year;
    }

    public static function typeDvigatel() {
        return [
            0 => 'БЕНЗИНОВЫЙ',
            1 => 'ДИЗЕЛЬНЫЙ',
        ];
    }

    public static function kpp() {
        return [
            0 => 'МЕХАНИКА',
            1 => 'АВТОМАТ',
        ];
    }

    public static function evakyator() {
        return [
            0 => 'ДА',
            1 => 'НЕТ',
        ];
    }

}
