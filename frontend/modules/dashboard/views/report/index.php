<?php
use yii\bootstrap4\Html;
use yii\widgets\ListView;
use yii\data\ArrayDataProvider;

$this->title = "Report";

$storico = [
    ['titolo' => 'Iscrizione', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Conferma email', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Caricamento foto', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Scontrino caricato', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Scontrino validato', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Punto vendita inserito', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Check-in', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Punto vendita inserito', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Punto vendita inserito', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Scontrino caricato', 'descrizione' => 'Data: ' . date('d/m/Y')],
    ['titolo' => 'Scontrino caricato', 'descrizione' => 'Data: ' . date('d/m/Y')],
];

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