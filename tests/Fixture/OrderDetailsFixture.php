<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderDetailsFixture
 */
class OrderDetailsFixture extends TestFixture
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
                'price' => 1.5,
                'quantity' => 1,
                'created_at' => '2024-07-13 17:25:29',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:25:29',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'product_id' => 1,
                'order_id' => 1,
            ],
        ];
        parent::init();
    }
}
