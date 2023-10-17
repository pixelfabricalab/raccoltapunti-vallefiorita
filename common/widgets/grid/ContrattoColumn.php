<?php
namespace common\widgets\grid;

use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Contratto;
use yii\mongodb\Query;

class ContrattoColumn extends DataColumn
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
        $params[0] = '//contratto/update';

        $class = 'font-weight-bold';

        $url = Url::toRoute($params);        

        return Html::a($codice, $url, ['data-pjax' => 0, 'class' => $class, 'style' => 'text-decoration: none;', 'data-numero' => $codice]);
    }
}