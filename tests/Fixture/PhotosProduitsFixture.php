<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhotosProduitsFixture
 */
class PhotosProduitsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'produit_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'photo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'produitsp_fk' => ['type' => 'index', 'columns' => ['produit_id'], 'length' => []],
            'photosp_fk' => ['type' => 'index', 'columns' => ['photo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'photosp_fk' => ['type' => 'foreign', 'columns' => ['photo_id'], 'references' => ['photos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'produitsp_fk' => ['type' => 'foreign', 'columns' => ['produit_id'], 'references' => ['produits', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'id' => 1,
                'produit_id' => 1,
                'photo_id' => 1,
            ],
        ];
        parent::init();
    }
}
