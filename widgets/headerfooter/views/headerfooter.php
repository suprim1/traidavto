<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 b-header">
    <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
        <img src="<?= app\modules\traidavto\TraidavtoAsset::assetUrl() ?>/img/logo.png" class="header-logo">
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 text-center">
        <span class="header-text-top">СРОЧНЫЙ ВЫКУП АВТОМОБИЛЕЙ</span><br>
        <span class="header-text-buttom"> В ПЕРМИ И ПЕРМСКОМ КРАЕ</span>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs text-right header-telephone">
        <?php foreach (Yii::$app->params['telephone'] as $phone): ?>
            <div class="col-lg-12">
                <?= $phone ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
