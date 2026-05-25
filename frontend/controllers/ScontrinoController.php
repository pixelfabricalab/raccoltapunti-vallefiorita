<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;

class ScontrinoController extends ActiveController
{
    public $modelClass = 'common\models\Scontrino';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];

        $behaviors['verbs'] = [
            'class' => VerbFilter::class,
            'actions' => [
                'index'  => ['GET', 'HEAD'],
                'view'   => ['GET', 'HEAD'],
                'create' => [],
                'update' => [],
                'delete' => [],
            ],
        ];

        return $behaviors;
    }
}
