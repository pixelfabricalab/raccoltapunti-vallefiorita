<?php

namespace common\widgets\form;

use Yii;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Render two radio buttons for Yes/No selection
 * @author Vincent Veri <vincent@pixelfabrica.biz>
 */
class ChooserInput extends \yii\jui\InputWidget
{

    public $model;
    public $attribute;

    public $entity;

    public $hideIdField = true;

    public $showCodiceField = false;

    public $onChange;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        return $this->renderWidget();
    }

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'chooser-input form-control form-control-sm';
        }
        if (!isset($this->entity)) {
            throw new \Exception("Imposta URL di destinazione");
        }
    }

    /**
     * @inheritdoc
     */
    public function renderWidget()
    {

        if ($this->hasModel()) {
            
            $is_invalid_container_class = '';
            if ($this->model->getErrors($this->attribute)) {
                $is_invalid_container_class = ' is-invalid';
                $this->options['class'] .= ' is-invalid';
            }

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

            $this->getView()->registerJs(
                "$('#{$this->options['id']}').on('change', function (evt) { if ($(this).val().trim() == '') { $('#{$prefix}_id, #{$prefix}_codice').val(''); console.log('field cancellati'); } });",
                \yii\web\View::POS_READY,
                $this->options['id'] . '-empty'
            );

            $attribute = str_replace("_descrizione", "_id", $this->attribute);
            $this->options['id'] = str_replace("_descrizione", "", $this->options['id']) . '_id';

            $btnName = str_replace("-", "", $this->options['id']);
            $idref = $this->options['id'];
            /*
            $this->getView()->registerJs(
                "$('#{$btnName}').on('click', function () { popupCenter({url: baseUrl + 'selezione/{$this->entity}/', title: 'Ricerca', w: 900, h: 800}); selectionTarget = '{$this->options['id']}'; });",
                \yii\web\View::POS_READY,
                $this->options['id'] . '-handler'
            );
            */

            if (!$this->hideIdField) {
                $widget .= Html::activeHiddenInput($this->model, $attribute, $this->options);
            }

            $attribute = str_replace("_id", "_codice", $attribute);
            $this->options['id'] = str_replace("_id", "_codice", $this->options['id']);
            if (!$this->showCodiceField) {
                $widget .= Html::activeHiddenInput($this->model, $attribute, $this->options);
            } else {
                $this->options['class'] = str_replace('form-control', 'codice-form-control form-control-sm', $this->options['class']);
                $this->options['style'] = 'width: 120px;';                
                $widget = Html::activeTextInput($this->model, $attribute, $this->options) . $widget;

                $this->getView()->registerJs(
                    "$('#{$this->options['id']}').on('change', function (evt) { if ($(this).val().trim() != '') { core.cliente($(this).val()).then(function (resp) { $('#{$prefix}_descrizione').val(resp.data.descrizione); sharedObject.current = resp.data; $('#{$prefix}_descrizione').trigger('change'); }).catch(function (e) { $('#{$prefix}_descrizione').val(''); }); } });",
                    \yii\web\View::POS_READY,
                    $this->options['id'] . '-handler'
                );

            }

            $container = "<div class=\"input-group {$is_invalid_container_class}\"><button class=\"btn btn-outline-info btn-sm\" type=\"button\" id=\"{$btnName}\" onclick=\"popupCenter({url: baseUrl + 'selezione/{$this->entity}/', title: 'Ricerca', w: 900, h: 800}); selectionTarget = '{$idref}';\"><i class=\"fas fa-search fa-sm\"></i></button>{$widget}</div>";

            return $container;
        } else {
            return Html::textInput($this->name, $this->value, $this->options);
        }
    }

}
