<?php
    namespace backend\controllers;

    use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    use yii\filters\VerbFilter;

    class StatisticheController extends Controller {
        /**
        * @inheritDoc
        */
        public function behaviors()
        {
            return array_merge(
                parent::behaviors(),
                [
                    'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'delete' => ['POST'],
                        ],
                    ],
               ]
            );
        }
        
        public function actionGenerali() {
            return $this->render('index');
        }

        public function actionPartecipanti() {
            return $this->render('partecipanti');
        }
        
        public function actionMarketingResearch() {
            return $this->render('mresearch');
        }
        
        public function actionCustomerSatisfaction() {
            return $this->render('customersatisfaction');
        }
    }