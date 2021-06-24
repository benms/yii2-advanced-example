<?php

namespace backend\tests\unit;

use backend\models\Category;
use backend\tests\UnitTester;

class CategoryCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
    }

    public function checkTableName(UnitTester $T)
    {
        $T->assertEquals('{{%category}}', Category::tableName());
    }
}
