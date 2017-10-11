<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use app\widgets\headerfooter\HeaderfooterWidget;
use app\widgets\yandex\YandexWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/img/favicon.png" type="image/png" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?= $content ?>
        </div>
        <footer class="footer">
            <div class="container">
                <?= HeaderfooterWidget::widget() ?>
            </div>
        </footer>

        <?php $this->endBody() ?>
        <?= YandexWidget::widget() ?>
    </body>
</html>
<?php $this->endPage() ?>
