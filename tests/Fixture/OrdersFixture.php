<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'total_amount' => 1.5,
                'payment_div' => '',
                'delivery_div' => '',
                'address' => 'Lorem ipsum dolor sit amet',
                'status' => '',
                'created_at' => '2024-07-13 17:25:22',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:25:22',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
