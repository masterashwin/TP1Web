<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produit Entity
 *
 * @property int $id
 * @property string $nom
 * @property int $user_id
 * @property string $slug
 * @property string|null $description
 * @property string|null $type
 * @property float|null $price
 * @property string|null $stock
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Commande[] $commandes
 * @property \App\Model\Entity\Review[] $reviews
 * @property \App\Model\Entity\Photo[] $photos
 * @property \App\Model\Entity\Type[] $types
 */
class Produit extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'nom' => true,
        'user_id' => true,
        'slug' => true,
        'description' => true,
        'type' => true,
        'price' => true,
        'stock' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'commandes' => true,
        'reviews' => true,
        'photos' => true,
        'types' => true,
    ];
}
