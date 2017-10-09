<?php

use app\widgets\headerfooter\HeaderfooterWidget;
?>
<div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center b1-backgroun-fara">
        <?= HeaderfooterWidget::widget() ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b1-text">УЗНАЙТЕ ПРЕДВАРИТЕЛЬНУЮ СТОИМОСТЬ ВЫКУПА, ПОЗВОНИВ ПО ТЕЛЕФОНУ</div><br>
        <div class="col-lg-12 col-md-12 col-sm-12 hidden-xs b1-telephone"><?= Yii::$app->params['telephone'][0] ?></div>
        <?php foreach (Yii::$app->params['telephone'] as $phone): ?>
            <div class="hidden-lg hidden-md hidden-sm col-xs-12 b1-telephone"><?= $phone ?></div>
        <?php endforeach; ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b1-text">ЛИБО ЗАПОЛНИТЕ ФОРМУ НИЖЕ:</div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b1-div-arrow"><img class="b1-img-arrow" src="<?= app\modules\traidavto\TraidavtoAsset::assetUrl() . '/img/arrow.png' ?>" ></div>
    </div>
</div>