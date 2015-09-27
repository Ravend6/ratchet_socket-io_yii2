<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class JSXAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        // 'js/src/hello.jsx',
        // 'js/dist/hello.js',
    ];
    // public $jsOptions = ['type'=>'text/jsx'];

    public $depends = [
        'frontend\assets\BowerAsset'
    ];
}