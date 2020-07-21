<?php

namespace mrmuminov\charts;

use yii\bootstrap\Widget;
use yii\helpers\Json;

class Charts extends Widget
{
    const TYPE_LINE             = 'line';
    const TYPE_BAR              = 'bar';
    const TYPE_RADAR            = 'radar';
    const TYPE_POLAR_AREA       = 'polarArea';
    const TYPE_PIE              = 'pie';
    const TYPE_DOUGHNUT         = 'doughnut';
    const TYPE_BUBBLE           = 'bubble';

    public $type;
    public $variable            = "myChart";
    public $data                = [];
    public $options             = [];

    public function init()
    {
        parent::init();
        $this->type = $this->type ? $this->type : 'line';
        $this->data = Json::encode($this->data);
        $this->options = Json::encode($this->options);
    }

    public function run()
    {
        $this->registerScript();
        echo '<canvas id="'.$this->id.'"></canvas>';
    }

    public function registerScript()
    {
        $view = $this->getView();
        ChartsAsset::register($view);

        $js = "
            let ctx = $('#$this->id');
            let ".$this->variable." = new Chart(ctx, {
                type: '".$this->type."',
                data: ".$this->data.",
                options: ".$this->options."
            });
        ";
        $view->registerJs($js);
    }
}
