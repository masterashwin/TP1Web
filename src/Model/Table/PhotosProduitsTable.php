<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PhotosProduits Model
 *
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\PhotosTable&\Cake\ORM\Association\BelongsTo $Photos
 *
 * @method \App\Model\Entity\PhotosProduit get($primaryKey, $options = [])
 * @method \App\Model\Entity\PhotosProduit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PhotosProduit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PhotosProduit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhotosProduit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PhotosProduit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PhotosProduit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PhotosProduit findOrCreate($search, callable $callback = null, $options = [])
 */
class PhotosProduitsTable extends Table
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

        $this->setTable('photos_produits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Photos', [
            'foreignKey' => 'photo_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['produit_id'], 'Produits'));
        $rules->add($rules->existsIn(['photo_id'], 'Photos'));

        return $rules;
    }
}
