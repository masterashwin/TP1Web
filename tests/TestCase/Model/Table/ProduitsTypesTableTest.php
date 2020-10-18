<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProduitsTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProduitsTypesTable Test Case
 */
class ProduitsTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProduitsTypesTable
     */
    public $ProduitsTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProduitsTypes',
        'app.Produits',
        'app.Types',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProduitsTypes') ? [] : ['className' => ProduitsTypesTable::class];
        $this->ProduitsTypes = TableRegistry::getTableLocator()->get('ProduitsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProduitsTypes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
