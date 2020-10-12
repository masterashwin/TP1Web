<?php

// src/Model/Entity/Produit.php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Produit extends Entity {

    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];

}
