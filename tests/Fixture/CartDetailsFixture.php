<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartDetailsFixture
 */
class CartDetailsFixture extends TestFixture
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
                'quantity' => 1,
                'created_at' => '2024-07-13 17:25:14',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:25:14',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'product_id' => 1,
                'cart_id' => 1,
            ],
        ];
        parent::init();
    }
}
