<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountiesTable Test Case
 */
class CountiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CountiesTable
     */
    public $Counties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Counties',
        'app.Regions',
        'app.Cities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Counties') ? [] : ['className' => CountiesTable::class];
        $this->Counties = TableRegistry::getTableLocator()->get('Counties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Counties);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
