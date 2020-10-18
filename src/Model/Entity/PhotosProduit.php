<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhotosProduit Entity
 *
 * @property int $id
 * @property int $produit_id
 * @property int $photo_id
 *
 * @property \App\Model\Entity\Produit $produit
 * @property \App\Model\Entity\Photo $photo
 */
class PhotosProduit extends Entity
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
        'photo_id' => true,
        'produit' => true,
        'photo' => true,
    ];
}
