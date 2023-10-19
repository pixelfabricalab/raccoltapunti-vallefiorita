<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('Premio 1');
        $I->seeLink('Servizi');
        $I->click('Servizi');
        $I->see('Servizi Profility');
    }
}