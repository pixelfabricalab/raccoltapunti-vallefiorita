<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;

class DateItColumn extends DataColumn
{
    public $headerOptions = ['style' => 'width:70px; text-align: right;'];
    public $contentOptions = ['style' => 'text-align: right;'];
    public $format = ['date', 'php:d/m/Y'];
    public $filterInputOptions = [
        'type' => 'date',
        'class' => 'form-control form-control-sm',
    ];
    public $evidenziaScadenza = false;

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        if ($this->content !== null || $value) {
            $content = parent::renderDataCellContent($model, $key, $index);
            if ($this->evidenziaScadenza === false) {
                return $content;
            }

            $class = '';
            $oggi = strtotime('now');
            $data = strtotime($value);
            if ($data < $oggi) {
                $class = 'text-danger';
                return "<strong class='{$class}'>{$content}</strong>";
            }
            return $content;
        } else {
            return '';
        }
    }    
}