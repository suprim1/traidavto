<?php

namespace app\modules\traidavto\controllers;

use Yii;
use yii\web\Controller;
use app\modules\traidavto\models\Avto;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use app\modules\traidavto\models\Mail;

class DefaultController extends Controller {

    public function actionIndex() {

        $model = new Avto;

        $typeKyzov = Avto::getQuery('type_Kyzov');
        $year = Avto::year();
        $typeAvto = Avto::getQuery('type_Avto');
        $typeDvigatel = Avto::getQuery('type_Dvigatel');
        $kpp = Avto::getQuery('Tkpp');
        $evakyator = Avto::getQuery('Tevakyator');

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

        $model = new Avto();
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('templates/blockForm', [
                        'model' => $model,
            ]);
        }

        if ($model->load(Yii::$app->request->post())) {
            $directory = date(time()) . '_' . $model->email;
            FileHelper::createDirectory($directory);
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload($directory)) {
                $model->imageFiles = $directory;
                $model->save(false);
                $query = Avto::setQuery($model->attributes['id']);
                $images = FileHelper::findFiles($model->imageFiles);
                $message = $this->renderPartial('mail', [
                    'model' => $model,
                    'query' => $query,
                ]);
                Mail::mails($message, $images);
                return $this->goHome();
            }
        } else {
            $model->getErrors();
        }
    }

}
