<?php

use yii\db\Migration;

/**
 * Class m220428_080459_create_utente_base_rbac
 */
class m220428_080459_create_utente_base_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // add "createPost" permission
        $autorizzazionesemplice = $auth->createPermission('navigasemplice');
        $autorizzazionesemplice->description = 'Naviga nel portale, visualizza i premi e carica scontrini';
        $auth->add($autorizzazionesemplice);

        // add "author" role and give this role the "createPost" permission
        $user_role = $auth->createRole('simpleuser');
        $auth->add($user_role);
        $auth->addChild($user_role, $autorizzazionesemplice);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220428_080459_create_utente_base_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220428_080459_create_utente_base_rbac cannot be reverted.\n";

        return false;
    }
    */
}
