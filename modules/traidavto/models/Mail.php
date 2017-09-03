<?php

namespace app\modules\traidavto\models;

use yii\db\Query;
use yii\helpers\ArrayHelper;

class Mail
{

    public static function tableName()
    {
        return 'Avto';
    }

    public static function getQuery(string $table)
    {

        $query = (new Query())
            ->select('id, type')
            ->from($table)
            ->all();
        return ArrayHelper::map($query, 'id', 'type');
    }

    public static function mails($message)
    {
        Yii::$app->mailer->compose()
            ->setFrom('suprim1@yandex.ru')
            ->setTo('suprim1@yandex.ru') // кому отправляем - реальный адрес куда придёт письмо формата asdf @asdf.com
            ->setSubject('Новая заявка на сайте Спецназ') // тема письма
            ->setTextBody('Поступило сообщение') // текст письма без HTML
            ->setHtmlBody($message)
            ->send();
    }

}
