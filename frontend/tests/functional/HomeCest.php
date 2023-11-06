<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('Premio 1');
        $I->seeLink('SERVIZI');
        $I->click('SERVIZI');
        $I->see('Servizi Profility');
    }
}