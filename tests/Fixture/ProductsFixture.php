<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'price' => 1.5,
                'tax' => 1.5,
                'max_quantity' => 1,
                'type' => 1,
                'start_date' => '2024-08-11 08:55:15',
                'end_date' => '2024-08-11 08:55:15',
                'created_at' => '2024-08-11 08:55:15',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-08-11 08:55:15',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
                'category_id' => 1,
                'brand_id' => 1,
            ],
        ];
        parent::init();
    }
}
