<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = "Statistiche generali";
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="statistiche-index">
    <iframe title="Statistiche generali" width="100%" height="1060" src="https://app.powerbi.com/reportEmbed?reportId=c43b2175-2687-4e92-87f3-49828491337f&autoAuth=true&ctid=654eb4f7-75b0-4d36-8ca6-594ec900ebd1" frameborder="0" allowFullScreen="true"></iframe>
</div>