<?php 
    namespace console\controllers;

    use Yii;
    use yii\console\Controller;
    use yii\console\ExitCode;
    use common\models\User;

    class AuthController extends Controller {
        public function actionAutorizzaAdmin($username) {
            $user = User::findByUsername($username);
            if (!is_null($user)) {
                $id = $user->id;
                $auth = Yii::$app->authManager;
                $admin_role = $auth->createRole('admin_user');
                $auth->assign($admin_role, $id);
                echo "Fatto! Adesso l'utente {$username} è abilitato per l'accesso al backend.";
                return ExitCode::OK;
            } else {
                echo "Errore: Username non esistente o errato!";
                ExitCode::DATAERR;
            }
        }

        public function actionInit()
        {
            $auth = Yii::$app->authManager;
            $auth->removeAll();

            // add "validateQrCode" permission
            $validateQrCode = $auth->createPermission('validateQrCode');
            $validateQrCode->description = 'Validate a QR Code';
            $auth->add($validateQrCode);

            // add "accessBusinessTools" permission
            $accessBusinessTools = $auth->createPermission('accessBusinessTools');
            $accessBusinessTools->description = 'Access Business Tools';
            $auth->add($accessBusinessTools);

            // add "business" role
            $business = $auth->createRole('business');
            $auth->add($business);
            $auth->addChild($business, $validateQrCode);
            $auth->addChild($business, $accessBusinessTools);

            // add "direzione" role
            $direzione = $auth->createRole('direzione');
            $auth->add($direzione);

            // add "simpleuser" role
            $simpleuser = $auth->createRole('simpleuser');
            $auth->add($simpleuser);

            // add "admin_user" role
            $admin = $auth->createRole('admin');
            $auth->add($admin);
            $auth->addChild($admin, $business);

            // assign base roles to users
            $auth->assign($admin, 1);
        }


    }