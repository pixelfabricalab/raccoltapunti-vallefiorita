<?php

namespace frontend\tests\functional;

use common\fixtures\UserFixture;
use common\fixtures\UserProfileFixture;
use frontend\tests\FunctionalTester;

class ResendVerificationEmailCest
{
    protected $formId = '#resend-verification-email-form';


    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::class,
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
            'profilo' => [
                'class' => UserProfileFixture::class,
                'dataFile' => codecept_data_dir() . 'profile_data.php'
            ],
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/resend-verification-email');
    }

    protected function formParams($email)
    {
        return [
            'ResendVerificationEmailForm[email]' => $email
        ];
    }

    public function checkPage(FunctionalTester $I)
    {
        $I->see('Email di verifica', 'h4');
        $I->see('Inserisci la tua email per ricevere nuovamente');
    }

    public function checkEmptyField(FunctionalTester $I)
    {
        $I->submitForm($this->formId, $this->formParams(''));
        $I->seeValidationError('Email cannot be blank.');
    }

    public function checkWrongEmailFormat(FunctionalTester $I)
    {
        $I->submitForm($this->formId, $this->formParams('abcd.com'));
        $I->seeValidationError('Email is not a valid email address.');
    }

    public function checkWrongEmail(FunctionalTester $I)
    {
        $I->submitForm($this->formId, $this->formParams('wrong@email.com'));
        $I->seeValidationError('There is no user with this email address.');
    }

    public function checkAlreadyVerifiedEmail(FunctionalTester $I)
    {
        $I->submitForm($this->formId, $this->formParams('test2@mail.com'));
        $I->seeValidationError('There is no user with this email address.');
    }

    public function checkSendSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, $this->formParams('test@mail.com'));
        $I->canSeeEmailIsSent();
        $I->seeRecord('common\models\User', [
            'email' => 'test@mail.com',
            'username' => 'test.test',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);
        $I->see('Check your email for further instructions.');
    }
}
