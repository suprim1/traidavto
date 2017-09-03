<?php

namespace app\modules\traidavto\models;

use yii\db\Query;
use yii\helpers\ArrayHelper;

class Avto extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'Avto';
    }

    public function rules()
    {
        return [
            [['modelAvto', 'year', 'typeDvigatel', 'kpp', 'city', 'name', 'email'], 'required'],
            [['sostoyanie'], 'string', 'length' => [2, 5000]],
            [['modelAvto', 'modelDvigatel', 'city', 'name', 'telephone'], 'string', 'max' => 100],
            [['summ', 'year', 'typeKyzov', 'typeDvigatel', 'kpp', 'evakyator', 'typeAvto'], 'integer',],
            [['email'], 'email'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 7, 'maxSize' => 8000000],
            [['telephone'], 'filter', 'filter' => function ($value) {
                $value = str_replace([' ', '(', ')', '-'], '', $value);
                if (strlen($value) == 12) {
                    $value = substr_replace($value, '+7', 0, 2);
                } elseif (strlen($value) == 11) {
                    $value = substr_replace($value, '8', 0, 1);
                }
                return $value;
            }],
        ];
    }

    public function attributeLabels()
    {
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
            'imageFiles' => 'Загрузите фотографию авто',
        ];
    }

    public static function getQuery(string $table)
    {

        $query = (new Query())
            ->select('id, type')
            ->from($table)
            ->all();
        return ArrayHelper::map($query, 'id', 'type');
    }

    public static function year()
    {
        for ($i = date('Y'); $i >= 1980; $i--) {
            $year [$i] = $i;
        }
        return $year;
    }

    public function upload(string $directory)
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs($directory . '/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

}
