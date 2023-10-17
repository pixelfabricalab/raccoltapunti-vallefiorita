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

}