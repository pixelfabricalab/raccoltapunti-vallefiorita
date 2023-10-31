<?php
use yii\data\ArrayDataProvider;
use yii\widgets\ListView;

$provider = new ArrayDataProvider([
    'allModels' => \Yii::$app->user->identity->profilo->coupon,
    'sort' => [
        'attributes' => ['id', 'username', 'email'],
    ],
    'pagination' => [
        'pageSize' => 20,
    ],
]);

?>

<div class="card mt-3">
    <div class="card-body">
        <h5 class="text-info text-center mb-4">I MIEI COUPON</h5>

<?php
echo ListView::widget([
    'dataProvider' => $provider,
    'itemView' => '../coupon/_single',
    'options' => ['class' => 'row d-flex justify-content-left align-items-left h-100'],
    'itemOptions' => ['tag' => false],
]);

?>

    </div>
</div>
