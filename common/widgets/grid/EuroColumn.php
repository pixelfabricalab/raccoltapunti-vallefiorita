<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;

class EuroColumn extends DataColumn
{
    public $headerOptions = ['style' => 'width:80px; text-align: right;'];
    public $contentOptions = ['style' => 'text-align: right;'];
    public $format = 'currency';
    public $footerOptions = ['class' => 'text-end'];
    
    public $displayEmpty = false;

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content === null) {
            $value = (float)round((float)$this->getDataCellValue($model, $key, $index), 2);
            if ($value == 0 && $this->displayEmpty) {
                return '';
            }
            return $this->grid->formatter->format($value, $this->format);
        }

        $content = parent::renderDataCellContent($model, $key, $index);
        if (is_numeric($content)) {
            $this->footer += (float)$content;
        }
        return $this->grid->formatter->format($content, $this->format);
    }

    public function getDataCellValue($model, $key, $index) {
        $value = parent::getDataCellValue($model, $key, $index);
        if (is_numeric($value)) {
            $this->footer += $value;
        }
        return $value;
    }

    /**
     * Renders the footer cell content.
     * The default implementation simply renders [[footer]].
     * This method may be overridden to customize the rendering of the footer cell.
     * @return string the rendering result
     */
    protected function renderFooterCellContent()
    {
        if (is_numeric($this->footer)) {
            return $this->grid->formatter->format($this->footer, $this->format);
        }
        return parent::renderFooterCellContent();
    }    
}