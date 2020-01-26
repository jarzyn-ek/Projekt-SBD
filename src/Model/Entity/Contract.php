<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property string $type
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime|null $end_date
 * @property int $worker_id
 * @property int $subcontractor_id
 *
 * @property \App\Model\Entity\Worker $worker
 * @property \App\Model\Entity\Subcontractor $subcontractor
 * @property \App\Model\Entity\Settlement[] $settlements
 */
class Contract extends Entity
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
        'type' => true,
        'start_date' => true,
        'end_date' => true,
        'worker_id' => true,
        'subcontractor_id' => true,
        'worker' => true,
        'subcontractor' => true,
        'settlements' => true,
    ];
}
