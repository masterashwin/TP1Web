<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Produits Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CommandesTable&\Cake\ORM\Association\HasMany $Commandes
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\PhotosTable&\Cake\ORM\Association\BelongsToMany $Photos
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsToMany $Types
 *
 * @method \App\Model\Entity\Produit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Produit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Produit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Produit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Produit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Produit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Produit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProduitsTable extends Table
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

        $this->setTable('produits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Commandes', [
            'foreignKey' => 'produit_id',
        ]);
        $this->hasMany('Reviews', [
            'foreignKey' => 'produit_id',
        ]);
        $this->belongsToMany('Photos', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'photo_id',
            'joinTable' => 'photos_produits',
        ]);
        $this->belongsToMany('Types', [
            'foreignKey' => 'produit_id',
            'targetForeignKey' => 'type_id',
            'joinTable' => 'produits_types',
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
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 191)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->allowEmptyString('type');

        $validator
            ->numeric('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('stock')
            ->maxLength('stock', 255)
            ->allowEmptyString('stock');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
