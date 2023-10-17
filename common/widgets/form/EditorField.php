<?php

namespace common\widgets\form;

use Yii;
use yii\helpers\Html;

/**
 * Render two radio buttons for Yes/No selection
 * @author Vincent Veri <vincent@pixelfabrica.biz>
 */
class EditorField extends ActiveField
{
    /**
     * Renders a text area.
     * The model attribute value will be used as the content in the textarea.
     * @param array $options the tag options in terms of name-value pairs. These will be rendered as
     * the attributes of the resulting tag. The values will be HTML-encoded using [[Html::encode()]].
     *
     * If you set a custom `id` for the textarea element, you may need to adjust the [[$selectors]] accordingly.
     *
     * @return $this the field object itself.
     */
    public function textarea($options = [])
    {
        $options = array_merge($this->inputOptions, $options);

        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
            $this->addErrorClassIfNeeded($options);
        }

        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);

        $id_editor = Html::getInputId($this->model, $this->attribute);
        $this->parts['{input}'] = "<div id='{$id_editor}-editor'></div>" . Html::activeTextarea($this->model, $this->attribute, $options);

        return $this;
    }

}
