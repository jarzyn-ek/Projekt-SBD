<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 * @property float $expected_profit
 *
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Subcontractor[] $subcontractors
 * @property \App\Model\Entity\Worker[] $workers
 */
class Project extends Entity
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
        'name' => true,
        'start_date' => true,
        'end_date' => true,
        'expected_profit' => true,
        'budgets' => true,
        'subcontractors' => true,
        'workers' => true,
    ];
}
