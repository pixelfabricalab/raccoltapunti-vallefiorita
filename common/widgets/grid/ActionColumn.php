<?php
namespace common\widgets\grid;

use yii\grid\ActionColumn as Base;
use yii\helpers\Html;
use yii\helpers\Url;

class ActionColumn extends Base
{
    /**
     * @var string the template used for composing each cell in the action column.
     * Tokens enclosed within curly brackets are treated as controller action IDs (also called *button names*
     * in the context of action column). They will be replaced by the corresponding button rendering callbacks
     * specified in [[buttons]]. For example, the token `{view}` will be replaced by the result of
     * the callback `buttons['view']`. If a callback cannot be found, the token will be replaced with an empty string.
     *
     * As an example, to only have the view, and update button you can add the ActionColumn to your GridView columns as follows:
     *
     * ```php
     * ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
     * ```
     *
     * @see buttons
     */
    public $template = '{update}';

    public $contentOptions = ['class' => 'text-center', 'style' => 'width: 40px;'];

    public $controllerId = '';

    public $backto;
    public $ref;

    public function init()
    {
        parent::init();

        $this->buttons = array_merge($this->buttons, [
            'download' => function ($url, $model, $key) {
                return $model->isVisible() ? Html::a(Html::tag('span', '', ['class' => 'fa fa-download']), 'download?id=' . (string)$model->_id)  : '';
            },
        ]);
    }

    public function createUrl($action, $model, $key, $index)
    {
        if ($this->controllerId) {
            $params = is_array($key) ? $key : ['id' => (string) $key];
            // var_dump($params);
            if (is_object($model)) {
                $params['id'] = (string)$model->_id;
            } else if (is_array($model)) {
                $params['id'] = $model['_id'];
            }
            $params[0] = $this->controllerId ? $this->controllerId . '/' . $action : $action;

            if ($this->backto != $this->controllerId) {
                $params['backto'] = $this->backto;
                $params['ref'] = \Yii::$app->request->get('id');
            }

            return Url::toRoute($params);
        }
        return parent::createUrl($action, $model, $key, $index);
    }
}