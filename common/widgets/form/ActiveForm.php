<?php
namespace common\widgets\form;

use yii\bootstrap5\ActiveForm as Base;

class ActiveForm extends Base
{
    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = ActiveField::class;

    public $applyOffset = false;

    public function init()
    {
        parent::init();

        if ($this->applyOffset) {
            $this->fieldConfig = [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-4',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-8',
                ],
            ];
        }
    }

}