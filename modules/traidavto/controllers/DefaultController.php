<?php

namespace app\modules\traidavto\controllers;

use yii\web\Controller;
use Yii;
use app\modules\traidavto\models\Traidavto;

class DefaultController extends Controller {

    public function actionIndex() {

       $block1 = $this->renderPartial('templates/block1');
       $blockForm = $this->renderPartial('templates/blockForm');
       $block2 = $this->renderPartial('templates/block2');
        return $this->render('index', [
                    'block1' => $block1,
                    'blockForm' => $blockForm,
                    'block2' => $block2,
        ]);
    }


}
