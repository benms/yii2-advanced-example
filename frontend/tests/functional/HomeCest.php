<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class HomeCest
{
    public function checkOpen(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see('My application');
        $I->see('You have successfully created your Yii-powered application.');
        $I->seeLink('Get started with Yii');
        $I->see('Tag');
        $I->see('News');
        $I->see('Category');
    }
}