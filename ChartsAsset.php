<?php

namespace mrmuminov\charts;

use yii\web\AssetBundle;

class ChartsAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@bower/chart.js';

    /**
     * @inherit
     */
    public $css = [

    ];

    /**
     * @inherit
     */
    public $js = [
        'dist/Chart.js'
    ];

    public function init()
    {
        parent::init();
    }
}