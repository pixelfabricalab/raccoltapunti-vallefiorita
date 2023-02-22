<?php

use yii\db\Migration;

/**
 * Class m230222_085053_create_azienda_role_rbac
 */
class m230222_085053_create_azienda_role_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // inizializza l'auth manager
        $auth = Yii::$app->authManager;
        // crea il tipo di autorizzazione
        $accesso_backend = $auth->createPermission('accessobackend');
        $accesso_backend->description = "Autorizzazione per accedere al backend, consente di vedere le statistiche e effettuare verifiche sulle scansioni";
        // aggiunge il tipo di autorizzazione al database
        $auth->add($accesso_backend);
        // crea il ruolo "admin"
        $admin_role = $auth->createRole('admin_user');
        $user_role = $auth->getRole('simpleuser');
        // aggiunge il nuovo ruolo al database
        $auth->add($admin_role);
        $auth->addChild($admin_role, $accesso_backend);
        $auth->addChild($admin_role, $user_role);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230222_085053_create_azienda_role_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230222_085053_create_azienda_role_rbac cannot be reverted.\n";

        return false;
    }
    */
}
