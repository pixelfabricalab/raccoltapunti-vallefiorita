<?php 
namespace common\components;

use Yii;
use yii\bootstrap5\NavBar;
use yii\bootstrap5\Html;
use yii\bootstrap5\Offcanvas;
use yii\helpers\ArrayHelper;

class PixelNavBar extends NavBar {

    /**
    * {@inheritDoc}
    */
    public function init()
    {
        // parent::init();
        if (!isset($this->options['class']) || empty($this->options['class'])) {
            Html::addCssClass($this->options, [
                'widget' => 'navbar',
                'toggle' => 'navbar-expand-lg',
                'navbar-light',
                'bg-light'
            ]);
        } else {
            Html::addCssClass($this->options, ['widget' => 'navbar']);
        }
        $navOptions = $this->options;
        $navTag = ArrayHelper::remove($navOptions, 'tag', 'nav');
        $brand = '';
        if (!isset($this->innerContainerOptions['class'])) {
            Html::addCssClass($this->innerContainerOptions, ['panel' => 'container']);
        }
        if ($this->collapseOptions !== false && !isset($this->collapseOptions['id'])) {
            $this->collapseOptions['id'] = "{$this->options['id']}-collapse";
        } elseif ($this->offcanvasOptions !== false && !isset($this->offcanvasOptions['id'])) {
            $this->offcanvasOptions['id'] = "{$this->options['id']}-offcanvas";
        }
        if ($this->brandImage !== false) {
            $this->brandLabel = Html::img($this->brandImage);
        }
        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, ['widget' => 'navbar-brand']);
            if ($this->brandUrl === null) {
                $brand = Html::tag('span', $this->brandLabel, $this->brandOptions);
            } else {
                $brand = Html::a(
                    $this->brandLabel,
                    $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl,
                    $this->brandOptions
                );
            }
        }

        echo Html::beginTag($navTag, $navOptions) . "\n";
        if ($this->renderInnerContainer) {
            echo Html::beginTag('div', $this->innerContainerOptions) . "\n";
        }
        echo $brand . "\n";
        // echo $this->renderToggleButton() . "\n";
        if ($this->collapseOptions !== false) {
            Html::addCssClass($this->collapseOptions, ['collapse' => 'aaaa', 'widget' => '']);
            $collapseOptions = $this->collapseOptions;
            $collapseTag = ArrayHelper::remove($collapseOptions, 'tag', 'div');
            echo Html::beginTag($collapseTag, $collapseOptions) . "\n";
        } elseif ($this->offcanvasOptions !== false) {
            Offcanvas::begin($this->offcanvasOptions);
        }
    }
}