<?php
namespace common\helpers;

use yii\helpers\ArrayHelper;
use common\models\Puntovendita;
use common\models\Profilo;
use common\models\Coupon;
use common\models\User;

class OptionsListRetriever
{
    /**
     * @return array ID => Nome utente
     */
    public function getUsers()
    {
        $users = \Yii::$app->cache->getOrSet('cache_users', function () {
            return ArrayHelper::map(User::find()->all(), 'id', 'username');
        }, 5);
        return $users;
    }

    /**
     * @return array ID => Nome utente
     */
    public function getProfili($withEmail = false)
    {
        if (!$withEmail) {
            return ArrayHelper::map(Profilo::find()->all(), 'id', 'cognomeNome');
        } else {
            return ArrayHelper::map(Profilo::find()->all(), 'id', 'cognomeNomeEmail');
        }

        $users = \Yii::$app->cache->getOrSet('cache_profili', function () {
            return ArrayHelper::map(Profilo::find()->all(), 'id', 'cognomeNome');
        }, 5);
        return $users;
    }

    /**
     * @return array ID => Ragione Sociale
     */
    public function getPuntivendita()
    {
        /*
        $users = \Yii::$app->cache->getOrSet('punti_vendita', function () {
            return ArrayHelper::map(Puntovendita::find()->all(), 'id', 'ragione_sociale');
        });
        */
        return ArrayHelper::map(Puntovendita::find()->all(), 'id', 'ragione_sociale');
    }

    /**
     * @return array ID => Ragione Sociale
     */
    public function getEsercenti()
    {
        /*
        $users = \Yii::$app->cache->getOrSet('punti_vendita', function () {
            return ArrayHelper::map(Puntovendita::find()->all(), 'id', 'ragione_sociale');
        });
        */
        return ArrayHelper::map(Profilo::find()->select(['id', 'ragione_sociale'])->where(['!=', 'id', 0])->all(), 'id', 'ragione_sociale');
    }

    public function getTipiSconto()
    {
        return [
            Coupon::SCONTO_PERCENTUALE => 'Percentuale',
            Coupon::SCONTO_IMPORTO => 'Importo Fisso',
        ];
    }
}