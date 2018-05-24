<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JumboclTicket Entity
 *
 * @property int $id
 * @property string $op
 * @property int $cause_id
 * @property int $user_id
 * @property int $cau_ticket_id
 * @property string $comments
 *
 * @property \App\Model\Entity\Cause $cause
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\CauTicket $cau_ticket
 */
class JumboclTicket extends Entity
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
        'op' => true,
        'cau' => true,
        'cause_id' => true,
        'user_id' => true,
        'cau_ticket_id' => true,
        'comments' => true,
        'cause' => true,
        'user' => true        
    ];
}
