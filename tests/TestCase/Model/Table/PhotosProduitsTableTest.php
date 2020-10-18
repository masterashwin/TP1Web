<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhotosProduitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhotosProduitsTable Test Case
 */
class PhotosProduitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PhotosProduitsTable
     */
    public $PhotosProduits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PhotosProduits',
        'app.Produits',
        'app.Photos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PhotosProduits') ? [] : ['className' => PhotosProduitsTable::class];
        $this->PhotosProduits = TableRegistry::getTableLocator()->get('PhotosProduits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhotosProduits);

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
