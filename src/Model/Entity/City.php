<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property int $region_id
 * @property int $county_id
 * @property string $name
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\County $county
 * @property \App\Model\Entity\Commande[] $commandes
 */
class City extends Entity
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
        'region_id' => true,
        'county_id' => true,
        'name' => true,
        'region' => true,
        'county' => true,
        'commandes' => true,
    ];
}
