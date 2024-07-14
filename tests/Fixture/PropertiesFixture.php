<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropertiesFixture
 */
class PropertiesFixture extends TestFixture
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
                'product_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'value' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-07-13 17:24:33',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:24:33',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
            ],
        ];
        parent::init();
    }
}
