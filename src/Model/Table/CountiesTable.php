<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Counties Model
 *
 * @property \App\Model\Table\RegionsTable&\Cake\ORM\Association\BelongsTo $Regions
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\HasMany $Cities
 *
 * @method \App\Model\Entity\County get($primaryKey, $options = [])
 * @method \App\Model\Entity\County newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\County[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\County|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\County saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\County patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\County[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\County findOrCreate($search, callable $callback = null, $options = [])
 */
class CountiesTable extends Table
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

        $this->setTable('counties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Regions', [
            'foreignKey' => 'region_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Cities', [
            'foreignKey' => 'county_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 80)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
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
        $rules->add($rules->existsIn(['region_id'], 'Regions'));

        return $rules;
    }
}
