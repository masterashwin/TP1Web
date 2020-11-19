<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Commandes Model
 *
 * @property \App\Model\Table\ProduitsTable&\Cake\ORM\Association\BelongsTo $Produits
 * @property \App\Model\Table\CitiesTable&\Cake\ORM\Association\BelongsTo $Cities
 *
 * @method \App\Model\Entity\Commande get($primaryKey, $options = [])
 * @method \App\Model\Entity\Commande newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Commande[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Commande|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commande saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Commande patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Commande[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Commande findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CommandesTable extends Table
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

        $this->setTable('commandes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Produits', [
            'foreignKey' => 'produit_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
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

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->integer('quantite')
            ->requirePresence('quantite', 'create')
            ->notEmptyString('quantite');

        $validator
            ->scalar('auteur')
            ->maxLength('auteur', 255)
            ->requirePresence('auteur', 'create')
            ->notEmptyString('auteur');

        $validator
            ->scalar('coupon')
            ->maxLength('coupon', 255)
            ->requirePresence('coupon', 'create')
            ->notEmptyString('coupon');

        $validator
            ->scalar('texte')
            ->requirePresence('texte', 'create')
            ->notEmptyString('texte');

        $validator
            ->boolean('prive')
            ->notEmptyString('prive');

        $validator
            ->notEmptyString('efface');

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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
