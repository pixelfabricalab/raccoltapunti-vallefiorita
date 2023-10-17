<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;

class CheckColumn extends DataColumn
{
    public $headerOptions = ['style' => 'width:90px; text-align: center;'];
    public $contentOptions = ['style' => 'text-align: center;'];
    public $format = 'html';
    
    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            $value = (int) $this->getDataCellValue($model, $key, $index);
            if ($value === 0) {
                return '<i class="fas fa-fw fa-times text-danger"></i>';
            } else {
                return '<i class="fas fa-fw fa-check text-success"></i>';
            }
            return $this->grid->formatter->format($this->getDataCellValue($model, $key, $index), $this->format);
        }

        return parent::renderDataCellContent($model, $key, $index);
    }

}