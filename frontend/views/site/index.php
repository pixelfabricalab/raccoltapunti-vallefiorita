<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'Profility';
?>
<div class="site-index">

    <?= $this->render('//_parts/hero') ?>


    <div class="container body-content">
        <div class="row">
            <div class ="col-md-4 col-xs-12 col-sm-12">
                <div class="bg-profility-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="profility-color display-5">Premio 1</h2>
                        <p class="lead profility-color ">150 punti.</p>
                    </div>
                    <div class="bg-profility-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-12">
                <div class="bg-profility-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
                    <div class="my-3 p-3">
                        <h2 class="profility-color display-5">Premio 2</h2>
                        <p class="lead profility-color">300 punti.</p>
                    </div>
                    <div class="bg-profility-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>
            <div class ="col-md-4 col-xs-12 col-sm-12">
                <div class="bg-profility-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
                    <div class="my-3 py-3">
                        <h2 class="profility-color display-5">Premio 3</h2>
                        <p class="lead profility-color">500 punti.</p>
                    </div>
                    <div class="bg-profility-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
                </div>
            </div>
        </div>
    </div>
</div>