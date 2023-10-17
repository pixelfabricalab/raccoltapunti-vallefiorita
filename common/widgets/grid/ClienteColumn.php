<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

class ClienteColumn extends DataColumn
{
    public $headerOptions = ['style' => 'width:90px; text-align: center;'];
    public $contentOptions = ['style' => 'text-align: center;'];
    public $format = 'html';

    /**
     * {@inheritdoc}
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content !== null) {
            return parent::renderDataCellContent($model, $key, $index);
        }

        $codice = $this->getDataCellValue($model, $key, $index);
        $params = ['id' => $codice];
        $params[0] = '//cliente/update';

        $url = Url::toRoute($params);        

        $linkOptions = [
            'data-pjax' => 0,

            // Popover
            /*
            'data-bs-toggle' => 'popover',
            'data-bs-content' => 'Contratti: 10<br>Fatture: 30',
            'data-bs-trigger' => 'hover focus',
            'data-bs-html' => 'true',
            */
        ];

        return Html::a($codice, $url, $linkOptions);
    }
}