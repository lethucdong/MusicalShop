<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'full_name' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'birthday' => '2024-07-14 01:46:14',
                'sex' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2024-07-14 01:46:14',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-14 01:46:14',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
            ],
        ];
        parent::init();
    }
}
