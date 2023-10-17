<?php

namespace common\widgets\form;

use Yii;

/**
 * Render two radio buttons for Yes/No selection
 * @author Vincent Veri <vincent@pixelfabrica.biz>
 */
class BooleanInput extends \yii\bootstrap5\Widget
{

    public $model;

    /**
     * {@inheritdoc}
     */
    public function run()
    {   
        return $this->model;
    }
}
