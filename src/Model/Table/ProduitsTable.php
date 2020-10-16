<?php

// src/Model/Table/ProduitsTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Utility\Text;
// add this use statement right below the namespace declaration to import
// the Validator class
use Cake\Validation\Validator;

class ProduitsTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
       $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            //'joinType' => 'INNER'
        ]);
    }

// Add the following method.

    public function beforeSave($event, $entity, $options) {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->nom);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }

// Add the following method.
    public function validationDefault(Validator $validator) {
        $validator
                ->allowEmptyString('nom', false)
                ->minLength('nom', 2)
                ->maxLength('nom', 255)
                ->allowEmptyString('text', false)
                ->minLength('text', 10);

        return $validator;
    }

}
