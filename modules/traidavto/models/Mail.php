<?php

namespace app\modules\traidavto\models;

use yii\db\Query;
use yii\helpers\ArrayHelper;
use Yii;

class Mail {

    public static function tableName() {
        return 'Avto';
    }

    public static function getQuery(string $table) {

        $query = (new Query())
                ->select('id, type')
                ->from($table)
                ->all();
        return ArrayHelper::map($query, 'id', 'type');
    }

    public static function mails($message, $images) {
        $mail = Yii::$app->mailer->compose()
                ->setFrom('suprim1@yandex.ru')
                ->setTo('suprim1@yandex.ru')
                ->setSubject('Заявка на выкуп Автос сайта avtovikup59')
                ->setHtmlBody($message);
        foreach ($images as $image) {
            $mail->attach($image);
        }
        $mail->send();
    }

}
