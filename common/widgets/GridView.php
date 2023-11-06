<?php
namespace common\widgets;

use kartik\grid\GridView as Base;
use Closure;
use yii\helpers\Html;
use MongoDB\BSON\ObjectID;

class GridView extends Base
{
    public $layout = "{summary}\n{items}\n{pager} {toolbarContainer}";

    public $resizableColumns = false;

    public $tableOptions = [
        'class' => 'table table-xs bg-white'
    ];

    public $bordered = false;

    public $hideToolbar = false;

    public function initGridView()
    {
        parent::initGridView();

        if ($this->hideToolbar) {
            $this->layout = "{summary}\n{items}\n{pager}";
        }
    }

    /**
     * Renders a table row with the given data model and key.
     * @param mixed $model the data model to be rendered
     * @param mixed $key the key associated with the data model
     * @param int $index the zero-based index of the data model among the model array returned by [[dataProvider]].
     * @return string the rendering result
     */
    public function renderTableRow($model, $key, $index)
    {
        $cells = [];
        /* @var $column Column */
        foreach ($this->columns as $column) {
            $cells[] = $column->renderDataCell($model, $key, $index);
        }
        if ($this->rowOptions instanceof Closure) {
            $options = call_user_func($this->rowOptions, $model, $key, $index, $this);
        } else {
            $options = $this->rowOptions;
        }
        // Gestisci griglia basata con oggetti mongo Db
        $options['data-key'] = (is_array($key) && !($key instanceof ObjectID)) ? json_encode($key) : (string) $key;

        return Html::tag('tr', implode('', $cells), $options);
    }
    

}