<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $id
 * @property string $description
 * @property string $final_user
 * @property int $user_id
 * @property int $state_id
 * @property int $country_id
 * @property int $cau_ticket_id
 * @property int $fizzmod_ticket_id
 * @property int $vtex_ticket_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\CauTicket $cau_ticket
 * @property \App\Model\Entity\FizzmodTicket $fizzmod_ticket
 * @property \App\Model\Entity\VtexTicket $vtex_ticket
 */
class Ticket extends Entity
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
        'description' => true,
        'final_user' => true,
        'user_id' => true,
        'state_id' => true,
        'country_id' => true,
        'cau_ticket_id' => true,
        'fizzmod_ticket_id' => true,
        'vtex_ticket_id' => true,
        'user' => true,
        'state' => true,
        'country' => true,
        'cau_ticket' => true,
        'fizzmod_ticket' => true,
        'vtex_ticket' => true
    ];
}
