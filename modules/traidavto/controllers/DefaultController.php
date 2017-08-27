<?php

namespace app\modules\traidavto\controllers;

use Yii;
use yii\web\Controller;
use app\modules\traidavto\models\Traidavto;

class DefaultController extends Controller {

    public function actionIndex() {

        $model = new Traidavto;

        $typeKyzov = Traidavto::getQuery('typeKyzov');
        $year = Traidavto::year();
        $typeAvto = Traidavto::getQuery('typeAvto');
        $typeDvigatel = Traidavto::getQuery('typeDvigatel');
        $kpp = Traidavto::getQuery('kpp');
        $evakyator = Traidavto::getQuery('evakyator');

        $block1 = $this->renderPartial('templates/block1');
        $blockForm = $this->renderPartial('templates/blockForm', compact('model', 'typeKyzov', 'year', 'typeAvto', 'typeDvigatel', 'kpp', 'evakyator'));
        $block2 = $this->renderPartial('templates/block2');

        return $this->render('index', [
                    'block1' => $block1,
                    'blockForm' => $blockForm,
                    'block2' => $block2,
        ]);
    }

    public function actionNew() {

        $model = new Traidavto();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('templates/blockForm', [
                        'model' => $model,
            ]);
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            var_dump($model->save());
            return $this->goHome();
        }
    }

}
