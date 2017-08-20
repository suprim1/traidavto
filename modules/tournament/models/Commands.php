<?php

namespace app\modules\tournament\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class Commands extends \yii\db\ActiveRecord {

    private $name;
    public static $id_tournament;

    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['id_tournament'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Выберите команды',
        ];
    }

    public static function commandAll() {
        $query = (new Query())
                ->select(['id', 'name'])
                ->from('commands')
                ->where(['id_tournament' => null])
                ->all();
        return $commands = ArrayHelper::map($query, 'id', 'name');
    }

    public static function commandOne(int $id) {
        return $command = Commands::find()
                ->where(['id' => $id])
                ->one();
    }

}
