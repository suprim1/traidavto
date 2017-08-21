<?php

namespace app\modules\traidavto;

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

}
