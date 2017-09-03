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
        //$to = "avtovikup59perm@yandex.ru";
        $to = "suprim1@yandex.ru";

        $subject = "Письмо с сайта avtovikup59.ru";

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: От кого письмо <from@example.com>\r\n";

        var_dump(mail($to, $subject, $message, $headers));
    }

}
