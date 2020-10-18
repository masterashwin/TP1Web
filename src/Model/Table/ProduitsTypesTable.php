<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProduitsTypes Model
 *
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 *
 * @method \App\Model\Entity\ProduitsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProduitsType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProduitsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProduitsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProduitsType findOrCreate($search, callable $callback = null, $options = [])
 */
class ProduitsTypesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('produits_types');
        $this->setDisplayField('produit_id');
        $this->setPrimaryKey(['produit_id', 'type_id']);

        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));
        $rules->add($rules->existsIn(['type_id'], 'Types'));

        return $rules;
    }
}
