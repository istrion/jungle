<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bien Entity
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $secteur_id
 * @property int $town_id
 * @property int $room
 * @property int $kitchen
 * @property int $shower
 * @property int $parking
 * @property string $description
 * @property int $dpe_id
 * @property string $agent_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Secteur $secteur
 * @property \App\Model\Entity\Town $ville
 * @property \App\Model\Entity\Dpe $dpe
 * @property \App\Model\Entity\Agent $agent
 */
class Bien extends Entity
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
        '*' => true,
        'id' => false
    ];
}
