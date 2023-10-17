<?php
namespace common\helpers;

use yii\helpers\ArrayHelper;
use common\models\Puntovendita;
use common\models\Profilo;
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
    public function getProfili()
    {
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
        $users = \Yii::$app->cache->getOrSet('punti_vendita', function () {
            return ArrayHelper::map(Puntovendita::find()->all(), 'id', 'ragione_sociale');
        });
        return $users;
    }
}