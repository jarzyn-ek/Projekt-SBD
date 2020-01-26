<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Settlement Entity
 *
 * @property int $id
 * @property float $charge
 * @property \Cake\I18n\FrozenTime $payment_due
 * @property int $contract_id
 * @property int $budget_id
 *
 * @property \App\Model\Entity\Contract $contract
 * @property \App\Model\Entity\Budget $budget
 */
class Settlement extends Entity
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
        'charge' => true,
        'payment_due' => true,
        'contract_id' => true,
        'budget_id' => true,
        'contract' => true,
        'budget' => true,
    ];
}
