<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VtexTicket Entity
 *
 * @property int $id
 * @property string $id_vtex
 * @property \Cake\I18n\FrozenTime $open_date
 * @property \Cake\I18n\FrozenTime $resolution_date
 * @property int $priority_id
 *
 * @property \App\Model\Entity\Priority $priority
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class VtexTicket extends Entity
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
        'id_vtex' => true,
        'open_date' => true,
        'resolution_date' => true,
        'priority_id' => true,
        'priority' => true,
        'tickets' => true
    ];
}
