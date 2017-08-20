<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

app\modules\tournament\TournamentAsset::register($this);
$this->title = 'Турниры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="js-tournament-open col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <?php if ($admin): ?>
        <?= Html::Button('Создать турнир', ['class' => 'btn btn-primary js-tournament_create', 'name' => 'tournament-button']) ?>
    <?php endif ?>
    <h1>Турниры</h1>
    <?php foreach ($tournaments as $tournament): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 background-tournament">
            <h2><?= $tournament['name'] ?></h2>
            <?php if ($admin): ?>
                <?= Html::Button('Добавить команду', [
                    'class' => 'btn btn-primary js-command_insert',
                    'name' => 'command_insert-button',
                    'data-id_tournament' => $tournament['id']]) ?>
                <?= Html::Button('Объявить матч', ['class' => 'btn btn-primary js-match_create', 'name' => 'match_create-button']) ?>
            <?php endif ?>
        </div>
    <?php endforeach; ?>


</div>
