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
            } else {
                echo "Errore: Username non esistente o errato!";
                ExitCode::DATAERR;
            }

        }
    }