<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductPropertiesFixture
 */
class ProductPropertiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'created_at' => '2024-08-11 08:55:35',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-08-11 08:55:35',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'product_id' => 1,
                'properties_id' => 1,
            ],
        ];
        parent::init();
    }
}
