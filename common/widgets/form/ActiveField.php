<?php
namespace common\widgets\form;

use yii\helpers\Html;
use yii\bootstrap5\ActiveField as Base;
use yii\helpers\ArrayHelper;

class ActiveField extends Base
{
    /**
     * {@inheritdoc}
     */
    public $options = ['class' => ['widget' => 'mb-1']];
    /**
     * {@inheritdoc}
     */
    public $inputOptions = ['class' => ['widget' => 'form-control form-control-sm']];

    public function currencyInput($options = [])
    {
        $options['type'] = 'number';
        $options['step'] = '0.01';
        $options['class'] = 'form-control text-right amount';

        return $this->textInput($options);
    }

    public function numberInput($options = [])
    {
        $options['type'] = 'number';
        $options['class'] = 'form-control form-control-sm';

        return $this->textInput($options);
    }

    public function yesNoInput($options = [])
    {
        return $this->dropDownList(\Yii::$app->opts->getSiNo(), $options);
    }

    public function italianDateInput($options = [])
    {
        $options['type'] = 'date';
        $options['class'] = 'form-control form-control-sm';

        return $this->textInput($options);
    }

    public function agenteInput($options = [])
    {
        $options['classType'] = \common\models\Agente::class;
        $options['codicePlaceholder'] = 'matr.';
        return $this->widget(\common\widgets\form\AutocompleteInput::class, $options);
    }

    public function catMercDropDownList($options = [])
    {
        if (!isset($options['prompt'])) {
            $options['prompt'] = ' - Seleziona';
        }
        $items = \Yii::$app->opts->getCategorieMerceologiche();
        return $this->dropDownList($items, $options);
    }

    /**
     * @param array $instanceConfig the configuration passed to this instance's constructor
     * @return array the layout specific default configuration for this instance
     */
    protected function createLayoutConfig(array $instanceConfig): array
    {
        $config = [
            'hintOptions' => [
                'tag' => 'div',
                'class' => ['form-text', 'text-muted'],
            ],
            'errorOptions' => [
                'tag' => 'div',
                'class' => 'invalid-feedback',
            ],
            'inputOptions' => [
                'class' => 'form-control form-control-sm',
            ],
            'labelOptions' => [
                'class' => ['form-label'],
            ],
        ];

        $layout = $instanceConfig['form']->layout;

        if ($layout === ActiveForm::LAYOUT_HORIZONTAL) {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
            $config['wrapperOptions'] = [];
            $config['labelOptions'] = [];
            $config['options'] = [];
            $cssClasses = [
                'offset' => ['col-sm-10', 'offset-sm-2'],
                'label' => ['col-sm-2', 'col-form-label'],
                'wrapper' => 'col-sm-10',
                'error' => '',
                'hint' => '',
                'field' => 'mb-2 row',
            ];
            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;

            Html::addCssClass($config['wrapperOptions'], $cssClasses['wrapper']);
            Html::addCssClass($config['labelOptions'], $cssClasses['label']);
            Html::addCssClass($config['errorOptions'], $cssClasses['error']);
            Html::addCssClass($config['hintOptions'], $cssClasses['hint']);
            Html::addCssClass($config['options'], $cssClasses['field']);
        } elseif ($layout === ActiveForm::LAYOUT_INLINE) {
            $config['inputOptions']['placeholder'] = true;
            $config['enableError'] = false;

            Html::addCssClass($config['labelOptions'], ['screenreader' => 'visually-hidden']);
        } elseif ($layout === ActiveForm::LAYOUT_FLOATING) {
            $config['inputOptions']['placeholder'] = true;
            $config['template'] = "{input}\n{label}\n{error}\n{hint}";
            Html::addCssClass($config['options'], ['layout' => 'form-floating mt-3']);
        }

        return $config;
    }    
}