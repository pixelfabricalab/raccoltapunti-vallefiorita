<?php
use yii\bootstrap4\Html;
use yii\widgets\ListView;
use yii\data\ArrayDataProvider;

$this->title = "Report";

$storico = [
    ['titolo' => 'Account creato', 'descrizione' => 'Data: ' . date('d/m/Y'), 'negative' => true,],
    ['titolo' => 'Conferma email', 'descrizione' => 'Data: ' . date('d/m/Y')],
];

foreach (\Yii::$app->user->identity->profilo->scontrini as $scontrino) {
    $storico[] = [
        'titolo' => 'Caricato scontrino',
        'descrizione' => 'Data: ' . date('d/m/Y'),
    ];
}
foreach (\Yii::$app->user->identity->profilo->coupon as $coupon) {
    $storico[] = [
        'titolo' => 'Richiesto coupon',
        'descrizione' => 'Data: ' . date('d/m/Y'),
    ];
}

$storico = array_reverse($storico);

$dataProvider = new ArrayDataProvider([
    'allModels' => $storico,
]);

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
    'itemOptions' => [
        'class' => 'list-group-item list-group-item-action'
    ],
    'options' => [
        'class' => 'list-view list-group',
    ] ,
]);

?>