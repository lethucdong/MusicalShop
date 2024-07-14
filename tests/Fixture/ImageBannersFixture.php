<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImageBannersFixture
 */
class ImageBannersFixture extends TestFixture
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
                'url_decription' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2024-07-13 17:24:42',
                'end_date' => '2024-07-13 17:24:42',
                'created_at' => '2024-07-13 17:24:42',
                'created_by' => 'Lorem ipsum dolor sit amet',
                'updated_at' => '2024-07-13 17:24:42',
                'updated_by' => 'Lorem ipsum dolor sit amet',
                'delete_flg' => 1,
            ],
        ];
        parent::init();
    }
}
