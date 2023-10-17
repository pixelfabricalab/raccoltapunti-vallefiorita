<?php
namespace common\widgets\form;

use yii\jui\AutoComplete as Base;
use yii\helpers\Html;

class AutoComplete extends Base
{
    /**
     * @inheritdoc
     */
    public function renderWidget()
    {
        if ($this->hasModel()) {
            // Ricava l'attributo _id del model
            $attribute = str_replace("autocomplete_", "", $this->attribute) . '_id';
            $id = str_replace("autocomplete_", "", $this->options['id']) . '_id';
            
            $this->options['data-id-ref'] = $id;

            if ($attribute == 'azienda_id') {
                $this->value = $this->model->getAziendaRagioneSociale();                
            }

            $widget = Html::textInput($this->name, $this->value, $this->options);

            $this->options['id'] = $id;

            $widget .= Html::activeHiddenInput($this->model, $attribute, $this->options);

            return $widget;
        } else {
            return Html::textInput($this->name, $this->value, $this->options);
        }
    }

}