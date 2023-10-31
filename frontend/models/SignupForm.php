<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Profilo;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    
    public $email;
    public $password;

    public $nome;
    public $cognome;

    // Business
    public $b2b;
    public $ragione_sociale;
    public $partita_iva;
    public $codice_fiscale;
    public $indirizzo;
    public $cap;
    public $comune;
    public $provincia;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cognome'], 'required', 'message' => 'Campo obbligatorio'],
            [['ragione_sociale', 'partita_iva', 'indirizzo', 'comune', 'cap'], 'required', 'message' => 'Campo obbligatorio', 'when' => function ($model) {
                return (int)$model->b2b == 1;
            }, 'whenClient' => "function (attribute, value) {
                return $('#signupform-b2b').val() == '1';
            }"],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email già registrata'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();
        $profilo = new Profilo();
        $profilo->nome = $this->nome;
        $profilo->cognome = $this->cognome;
        $profilo->b2b = (int)$this->b2b;

        if ($profilo->b2b) {
            $profilo->ragione_sociale = $this->ragione_sociale;
            $profilo->partita_iva = $this->partita_iva;
            $profilo->indirizzo = $this->indirizzo;
            $profilo->cap = $this->cap;
            $profilo->comune = $this->comune;
            $profilo->provincia = $this->provincia;
        }
        
        $profilo->user_id = $user->id;
        $profilo->save(false);

        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}