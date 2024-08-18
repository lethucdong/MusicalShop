<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductPropertiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductPropertiesTable Test Case
 */
class ProductPropertiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductPropertiesTable
     */
    protected $ProductProperties;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ProductProperties',
        'app.Products',
        'app.Properties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ProductProperties') ? [] : ['className' => ProductPropertiesTable::class];
        $this->ProductProperties = $this->getTableLocator()->get('ProductProperties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ProductProperties);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProductPropertiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ProductPropertiesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
