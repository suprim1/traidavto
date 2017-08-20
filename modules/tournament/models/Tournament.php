<?php

namespace app\modules\tournament\models;

use Yii;
use yii\db\Query;

class Tournament extends \yii\db\ActiveRecord {

    private $name;

    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Название турнира',
        ];
    }

    public static function tableName() {
        return '{{tournament}}';
    }

    public static function tournamentInfo() {
        $query = new Query();
        return $query->select(['t.id as id', 't.name as name', 'c.id as idcom'])
                //->from(['c' => 'commands'])
                ->from(['t' => 'tournament'])
                ->leftJoin('commands c', 't.id = c.id_tournament' )
                ->groupBy('t.name')
                ->all();
    }

}
