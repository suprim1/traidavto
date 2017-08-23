<?php

namespace app\modules\traidavto;
use Yii;

class TraidavtoAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@app/modules/traidavto/assets';
    public $js = [
        'js/traidavto.js',
    ];
    public $css = [
        'css/traidavto.css',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];

    public static function assetUrl()
    {
        $asset = TraidavtoAsset::register(Yii::$app->view);
        return $asset->baseUrl;
    }

}
