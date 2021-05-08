<?php

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

class ReloadPage extends AssetBundle
{
    public $sourcePath = '@app/assets/reload-page-assets';

    public $js = [
        'reload-page.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $publishOptions = ['forceCopy' => YII_DEBUG];
}