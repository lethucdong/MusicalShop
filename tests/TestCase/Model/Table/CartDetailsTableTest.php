<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CartDetailsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CartDetailsTable Test Case
 */
class CartDetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CartDetailsTable
     */
    protected $CartDetails;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CartDetails',
        'app.Products',
        'app.Carts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CartDetails') ? [] : ['className' => CartDetailsTable::class];
        $this->CartDetails = $this->getTableLocator()->get('CartDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CartDetails);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CartDetailsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CartDetailsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
