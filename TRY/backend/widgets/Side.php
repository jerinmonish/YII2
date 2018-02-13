<?php

namespace backend\widgets;

use Yii;
use yii\base\Widget;

class Side extends Widget {
    public $action;
    
    public function init() {
        parent::init();                
    }

    public function run() {
        return $this->render('side');
    }
}