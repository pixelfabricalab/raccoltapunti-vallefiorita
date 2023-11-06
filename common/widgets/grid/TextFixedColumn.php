<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

class TextFixedColumn extends DataColumn
{
    public $width = 120;
    public $format = 'html';
    public $textAlign = 'left';

    public function init()
    {
        parent::init();

        $this->headerOptions = [
            'style' => "width:{$this->width}px;text-align:{$this->textAlign}",
        ];
        $this->contentOptions = [
            'style' => "text-align:{$this->textAlign};",
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content !== null) {
            return parent::renderDataCellContent($model, $key, $index);
        }
        return $this->getDataCellValue($model, $key, $index);
    }
}