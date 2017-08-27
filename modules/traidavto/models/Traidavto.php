<?php

namespace app\modules\traidavto\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class Traidavto extends \yii\db\ActiveRecord {

    /**
     * Тип автомобиля
     * @var string
     */
    public $typeAvto = 1;

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
    public $typeDvigatel = 1;

    /**
     * Коробка передач
     * @var integer
     */
    public $kpp = 1;

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
    public $evakyator = 1;

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

    public static function getQuery(string $table) {

        $query = (new Query())
                ->select('id, type')
                ->from($table)
                ->all();
        return ArrayHelper::map($query, 'id', 'type');
    }

    public static function year() {
        for ($i = date('Y'); $i >= 1980; $i--) {
            $year [$i] = $i;
        }
        return $year;
    }

}
