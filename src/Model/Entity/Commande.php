<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Commande Entity
 *
 * @property int $id
 * @property int $produit_id
 * @property \Cake\I18n\FrozenDate $date
 * @property int $quantite
 * @property string $auteur
 * @property string $coupon
 * @property string $texte
 * @property bool $prive
 * @property int $efface
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Produit $produit
 */
class Commande extends Entity
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
        'produit_id' => true,
        'date' => true,
        'quantite' => true,
        'auteur' => true,
        'coupon' => true,
        'texte' => true,
        'prive' => true,
        'efface' => true,
        'created' => true,
        'modified' => true,
        'produit' => true,
    ];
}
