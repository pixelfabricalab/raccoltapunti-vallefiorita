<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

class AgenteColumn extends DataColumn
{
    public $headerOptions = ['style' => 'width:70px; text-align: center;'];
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
        $params[0] = '//agente/update';

        $url = Url::toRoute($params);        

        return Html::a($codice, $url, ['data-pjax'=>0]);
    }
}