<?php
namespace common\widgets\form;

use yii\jui\AutoComplete as Base;
use yii\helpers\Html;

class AutocompleteInput extends Base
{
    public $classType;
    public $pageSize;

    public $codiceColumnClass;

    public $withIdField;
    public $hideCodiceField;

    public $codicePlaceholder;

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'ui-autocomplete-input form-control form-control-sm';
        }

        if (!isset($this->pageSize)) {
            $this->pageSize = 100;
        }

        if (!isset($this->hideCodiceField)) {
            $this->hideCodiceField = false;
        }

        if (!isset($this->withIdField)) {
            $this->withIdField = true;
        }

        if (!isset($this->codiceColumnClass)) {
            $this->codiceColumnClass = 'col-3';
        }

        if (!isset($this->codicePlaceholder)) {
            $this->codicePlaceholder = '';
        }

        if (!isset($this->classType)) {
            throw new \Exception("Tipo classe non impostata");
        } else {
            $this->clientOptions["source"] = \Yii::getAlias('@web/cerca?classType=' . $this->classType . '&pageSize=' . $this->pageSize);
            $this->clientOptions["autoFocus"] = true;
            $this->clientOptions["minLength"] = 3;
        }

        if (!isset($this->clientEvents['select'])) {
            $codice = str_replace("descrizione", "codice", $this->options['id']);
            $_id = str_replace("descrizione", "id", $this->options['id']);
            $this->clientEvents['select'] = 'function (evt, ui) { $("#' . $codice . '").val(ui.item.codice).trigger("change"); $("#' . $_id . '").val(ui.item.id).trigger("change"); }';
        }
    }

    /**
     * @inheritdoc
     */
    public function renderWidget()
    {
        if ($this->hasModel()) {

            $pre = "<div class='row g-1'>";

            $widget = "<div class='col'>" . Html::activeTextInput($this->model, $this->attribute, $this->options) . "</div>";

            $classes = $this->options['class'];

            $this->options['placeholder'] = $this->codicePlaceholder;
            // Popola il codice
            $attribute = str_replace("descrizione", "codice", $this->attribute);
            $id = str_replace("descrizione", "", $this->options['id']) . 'codice';
            $this->options['id'] = $id;
            $this->options['class'] = $classes . ' autocomplete-codice';
            if (isset($this->options['value'])) {
                unset($this->options['value']);
            }
            if (!$this->hideCodiceField) {
                $pre .= "<div class='" . $this->codiceColumnClass . "'>" . Html::activeTextInput($this->model, $attribute, $this->options) . "</div>";
            } else {
                $pre .= Html::activeHiddenInput($this->model, $attribute, $this->options);
            }

            if ($this->withIdField) {
                // Popola l'id mongo
                $attribute = str_replace("descrizione", "id", $this->attribute);
                $id = str_replace("codice", "", $this->options['id']) . 'id';
                $this->options['id'] = $id;
                $this->options['class'] = $classes . ' autocomplete-id';
                $after = Html::activeHiddenInput($this->model, $attribute, $this->options) . "</div>";
            } else {
                $after = '</div>';
            }

            return $pre . $widget . $after;
        } else {
            return Html::textInput($this->name, $this->value, $this->options);
        }
    }

}