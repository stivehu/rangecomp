<?php

namespace stivehu\rangecomp;

use Yii;
use yii\web\AssetBundle;

/**
 * Description of Assets
 *
 * @author stive
 */
class Asserts extends AssetBundle
{

    public $sourcePath = '@rangecomp/assets';
    public $js = [
        'rangecomp.js'
    ];

    public function init()
    {
        Yii::setAlias('@rangecomp', __DIR__);
        return parent::init();
    }

}
