<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImageProductsFixture
 */
class ImageProductsFixture extends TestFixture
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
                'piority' => 1,
                'path_image' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2024-07-13 17:24:50',
                'end_date' => '2024-07-13 17:24:50',
                'created_at' => '2024-07-13 17:24:50',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:24:50',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'product_id' => 1,
            ],
        ];
        parent::init();
    }
}
