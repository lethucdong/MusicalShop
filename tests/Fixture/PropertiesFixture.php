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
                'name' => 'Lorem ipsum dolor sit amet',
                'value' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-08-11 08:55:27',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-08-11 08:55:27',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
            ],
        ];
        parent::init();
    }
}
