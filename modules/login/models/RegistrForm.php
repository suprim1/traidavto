<?php

namespace app\modules\login\models;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegistrForm extends \yii\db\ActiveRecord {

    public $email;
    public $password;
    public $name;
    public $termsOfUse = false;
    public $tablePrefix = '';

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['email', 'password', 'name'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            ['termsOfUse', 'boolean'],
            [['password'], 'string'],
            [['name'], 'string'],
        ];
    }

    public static function tableName() {
        return '{{users}}';
    }

    public function getUser() {
        return Users::findOne(['email' => $this->email]);
    }

    public function attributeLabels() {
        return [
            'email' => 'E-mail',
            'password' => 'Пароль',
            'name' => 'Ваше имя',
            'termsOfUse' => 'Согласен с правилами',
        ];
    }

}
