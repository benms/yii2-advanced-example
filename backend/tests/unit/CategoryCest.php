<?php

namespace backend\tests\unit;

use backend\models\Category;
use backend\tests\UnitTester;
use common\fixtures\CategoryFixture;

class CategoryCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
    }

    public function _fixtures()
    {
        return [
            'category' => [
                'class' => CategoryFixture::class
            ]
        ];
    }

    public function checkTableName(UnitTester $T)
    {
        $T->assertEquals('{{%category}}', Category::tableName());
    }

    public function checkDefaultState(UnitTester $I)
    {
        $model = new Category();
        $I->assertTrue($model->isNewRecord);
        $I->assertNull($model->id);
        $I->assertNull($model->slug);
        $I->assertNull($model->title);
        $I->assertNull($model->enabled);
    }

    public function validationData(): array
    {
        return [
            // title
            [
                // required
                'attribute' => 'title', 'value' => null, 'isValid' => false,
            ],
            [
                // string
                'attribute' => 'title', 'value' => str_repeat('A', 1), 'isValid' => true,
            ],
            [
                // string max 256
                'attribute' => 'title', 'value' => str_repeat('A', 257), 'isValid' => false,
            ],

            // slug
            [
                // string
                'attribute' => 'slug', 'value' => str_repeat('A', 1), 'isValid' => true,
            ],
            [
                // string max 256
                'attribute' => 'slug', 'value' => str_repeat('A', 257), 'isValid' => false,
            ],
            // enabled
            [
                // required, default 0
                'attribute' => 'enabled', 'value' => null, 'isValid' => true,
            ],
            [
                // boolean
                'attribute' => 'enabled', 'value' => 0, 'isValid' => true,
            ],
            [
                // boolean
                'attribute' => 'enabled', 'value' => 1, 'isValid' => true,
            ],
        ];
    }

    /**
     * @param UnitTester $I
     * @param \Codeception\Example $data
     *
     * @dataProvider validationData
     */
    public function checkValidationRules(UnitTester $I, \Codeception\Example $data)
    {
        $model = new Category();
        $model->setAttribute($data['attribute'], $data['value']);

        $I->assertEquals($data['isValid'], $model->validate([$data['attribute']]));
    }


    /**
     * @param UnitTester $I
     * @param \Codeception\Example $data
     * @dataProvider uniqDataProvider
     */
    public function checkSlugIsUnique(UnitTester $I, \Codeception\Example $data)
    {
        $model = new Category();
        //unique
        $model->setAttribute('slug', $data['slug']);
        $I->assertEquals($data['expected_valid'], $model->validate('slug'));
        $I->assertEquals($data['expected_empty_errors'], empty($model->getErrors('slug')));
    }

    public function uniqDataProvider(): array
    {
        return [
            ['slug' => 'some-unique-val', 'expected_valid' => true, 'expected_empty_errors' => true],
            ['slug' => 'auto', 'expected_valid' => false, 'expected_empty_errors' => false],
        ];
    }
}
