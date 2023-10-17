<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Coupon $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coupons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coupon-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'codice',
            'data_utilizzo',
            'status',
            'sconto_importo',
            'sconto_percentuale',
            'creato_il',
            'modificato_il',
            'profile_id',
            'puntovendita_id',
        ],
    ]) ?>

</div>
