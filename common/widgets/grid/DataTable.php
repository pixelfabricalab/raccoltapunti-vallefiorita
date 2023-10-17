<?php
namespace common\widgets\grid;

use yii\base\Widget;
use yii\helpers\Html;

class DataTable extends Widget
{
    public $className;

    public $tableCssClass = 'display table table-xs table-hover bg-white table-bordered';

    public $calculateTotals = '';

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('datatable', ['className' => $this->className, 'tableCssClass' => $this->tableCssClass, 'calculateTotals' => $this->calculateTotals]);
    }
}