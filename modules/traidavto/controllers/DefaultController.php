<?php

namespace app\modules\traidavto\controllers;

use yii\web\Controller;
use app\modules\traidavto\models\Traidavto;

class DefaultController extends Controller {

    public function actionIndex() {

        $model = new Traidavto;

        $typeKyzov = Traidavto::typeKyzov();
        $year = Traidavto::year();
        $typeAvto = Traidavto::typeAvto();
        $typeDvigatel = Traidavto::typeDvigatel();
        $kpp = Traidavto::kpp();
        $evakyator = Traidavto::evakyator();

        $block1 = $this->renderPartial('templates/block1');
        $blockForm = $this->renderPartial('templates/blockForm', compact('model', 'typeKyzov', 'year', 'typeAvto', 'typeDvigatel', 'kpp', 'evakyator'));
        $block2 = $this->renderPartial('templates/block2');

        return $this->render('index', [
                    'block1' => $block1,
                    'blockForm' => $blockForm,
                    'block2' => $block2,
        ]);
    }

}
