<?php
namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class DeleteButton extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        if (is_null($this->model)) {
            return '';
        }
        return Html::a('Elimina', ['delete', 'id' => (string) $this->model->_id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Vuoi davvero eliminare questo elemento?',
                'method' => 'post',
            ],
        ]);
    }
}
