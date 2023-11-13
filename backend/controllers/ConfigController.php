<?php

namespace backend\controllers;

use common\models\Configuration as Cfg;

class ConfigController extends \backend\controllers\Controller
{
    public $showToolbar = false;

    public $defaultCfgKeys = [
        'sys_ragione_sociale' => 'RAGIONE SOCIALE',
        'sys_partita_iva' => 'PARTITA IVA',
        'sys_codice_fiscale' => 'CODICE FISCALE',
        'sys_nome' => 'NOME',
        'sys_cognome' => 'COGNOME',
        'sys_keywords' => 'PAROLE CHIAVE',
    ];

    public function actionIndex()
    {

        $settings = Cfg::find()->indexBy('id')->all();

        if (empty($settings)) {
            foreach ($this->defaultCfgKeys as $key => $etichetta) {
                $settings[] = new Cfg(['cfg_key' => $key, 'etichetta' => $etichetta]);
            }
        }

        if ($this->request->isPost) {
            if (Cfg::loadMultiple($settings, $this->request->post())) {
                foreach ($settings as $config) {
                    $config->save(false);
                }
                $this->addOk();
                return $this->redirect(['index']);
            }
        }

        return $this->render('index', [
            'settings' => $settings,
        ]);
    }

}
