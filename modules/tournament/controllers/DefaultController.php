<?php

namespace app\modules\tournament\controllers;

use yii\web\Controller;
use Yii;
use app\modules\tournament\models\Tournament;
use app\modules\tournament\models\Commands;

class DefaultController extends Controller {

    public function actionIndex() {

        if (!Yii::$app->user->isGuest) {
            $admin = Yii::$app->user->identity->admin;
            $tournament = Tournament::tournamentInfo();
            echo '<pre>';var_dump($tournament);die;
            return $this->render('index', [
                        'admin' => $admin,
                        'tournaments' => $tournament,
            ]);
        }
        $test = User::info();
        return $this->render('index', [
                    'test' => $test,
        ]);
    }

    public function actionCreate() {
        if (!Yii::$app->user->isGuest) {
            $model = new Tournament();
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('tournamentCreate', [
                            'model' => $model,
                ]);
            }
            if ($model->load(Yii::$app->request->post()) && $model->validate() && Yii::$app->user->identity->admin) {
                $model->save();
                return $this->goHome();
            }
        }
    }

    public function actionCommandInsert() {
        if (!Yii::$app->user->isGuest) {
            $model = new Commands();
            if (Yii::$app->request->isAjax) {
                $idTournament = Yii::$app->request->post('idTournament');
                $commands = Commands::commandAll();
                return $this->renderAjax('commandInsert', [
                            'model' => $model,
                            'commands' => $commands,
                            'idTournament' => $idTournament,
                ]);
            }
            $request = Yii::$app->request->post();
            $idTournament['id_tournament'] = $request['id_tournament'];
            foreach ($request['Commands']['name'] as $commands) {
                $model = Commands::commandOne($commands);
                $model->id_tournament = $request['id_tournament'];
                if ($model->validate() && Yii::$app->user->identity->admin) {
                    $model->save();
                }
            }
            return $this->goHome();
        }
    }

}
