<?php

namespace common\widgets\form;

use Yii;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Render two radio buttons for Yes/No selection
 * @author Vincent Veri <vincent@pixelfabrica.biz>
 */
class IndirizzoInput extends ChooserInput
{

    /**
     * @inheritdoc
     */
    public function renderWidget()
    {

        if ($this->hasModel()) {

            $widget = Html::activeTextInput($this->model, $this->attribute, $this->options);

            $prefix = str_replace("_descrizione", "", $this->options['id']);

            if ($this->onChange) {
                $expr = new JsExpression($this->onChange);
                $this->getView()->registerJs(
                    "$('#{$this->options['id']}').on('change', {$this->onChange});",
                    \yii\web\View::POS_READY,
                    $this->options['id'] . '-listener'
                );
            }

            $attribute = str_replace("_descrizione", "_id", $this->attribute);
            $this->options['id'] = str_replace("_descrizione", "", $this->options['id']) . '_id';

            $btnName = str_replace("-", "", $this->options['id']);
            $this->getView()->registerJs(
                "const {$btnName} = document.getElementById('{$btnName}'); if ({$btnName}) { {$btnName}.onclick = () => { popupCenter({url: baseUrl + 'selezione/{$this->entity}/', title: 'Ricerca', w: 900, h: 800}); selectionTarget = '{$this->options['id']}'; }; }",
                \yii\web\View::POS_READY,
                $this->options['id'] . '-handler'
            );

            $container = "<div class=\"input-group\"><button class=\"btn btn-outline-info btn-sm\" type=\"button\" id=\"{$btnName}\"><i class=\"fas fa-search fa-sm\"></i></button>{$widget}</div>";

            return $container;
        } else {
            return Html::textInput($this->name, $this->value, $this->options);
        }
    }

}
