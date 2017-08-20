<?php

namespace app\modules\tournament;

class TournamentAsset extends \yii\web\AssetBundle
{

    public $sourcePath = '@app/modules/tournament/assets';
    public $js = [
        'js/tournament.js',
    ];
    public $css = [
        'css/tournament.css',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];

}
