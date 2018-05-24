<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CauTicket Entity
 *
 * @property int $id
 * @property int $cau
 * @property \Cake\I18n\FrozenTime $open_date
 * @property \Cake\I18n\FrozenTime $answer_date
 * @property \Cake\I18n\FrozenTime $resolution_date
 * @property int $type_ticket_id
 *
 * @property \App\Model\Entity\TypeTicket $type_ticket
 * @property \App\Model\Entity\JumboclTicket[] $jumbocl_tickets
 */
class CauTicket extends Entity
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
        'cau' => true,
        'open_date' => true,
        'answer_date' => true,
        'resolution_date' => true,
        'type_ticket_id' => true,
        'type_ticket' => true,
        'jumbocl_tickets' => true
    ];
}
