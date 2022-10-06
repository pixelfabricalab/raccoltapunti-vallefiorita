<?php
namespace common\widgets;

use yii\grid\GridView as Base;

class GridView extends Base
{
    public $layout = "{items}\n{pager}";

    public $tableOptions = [
        'class' => 'table table-hover table-xs table-striped'
    ];
}