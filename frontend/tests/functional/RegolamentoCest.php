<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class RegolamentoCest
{
    public function checkAbout(FunctionalTester $I)
    {
        $I->amOnRoute('site/regolamento');
        $I->see('Regolamento', 'h1');
    }
}
