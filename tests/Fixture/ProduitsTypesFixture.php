<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProduitsTypesFixture
 */
class ProduitsTypesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'produit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'type_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'typesp_fk' => ['type' => 'index', 'columns' => ['type_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['produit_id', 'type_id'], 'length' => []],
            'produitst_fk' => ['type' => 'foreign', 'columns' => ['produit_id'], 'references' => ['produits', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'typesp_fk' => ['type' => 'foreign', 'columns' => ['type_id'], 'references' => ['types', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'produit_id' => 1,
                'type_id' => 1,
            ],
        ];
        parent::init();
    }
}
