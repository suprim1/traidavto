<?php

namespace app\modules\tournament\controllers;

use yii\web\Controller;
use Yii;
use app\modules\traidavto\models\Traidavto;

class DefaultController extends Controller {

    public function actionIndex() {

       $test = 'test';
        return $this->render('index', [
                    'test' => $test,
        ]);
    }


}
