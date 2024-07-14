<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImageBannersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImageBannersTable Test Case
 */
class ImageBannersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ImageBannersTable
     */
    protected $ImageBanners;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ImageBanners',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ImageBanners') ? [] : ['className' => ImageBannersTable::class];
        $this->ImageBanners = $this->getTableLocator()->get('ImageBanners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ImageBanners);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ImageBannersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
