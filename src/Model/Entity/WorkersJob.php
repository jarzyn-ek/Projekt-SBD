<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkersJob Entity
 *
 * @property int $id
 * @property int $worker_id
 * @property int $job_id
 *
 * @property \App\Model\Entity\Worker $worker
 * @property \App\Model\Entity\Job $job
 */
class WorkersJob extends Entity
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
        'worker_id' => true,
        'job_id' => true,
        'worker' => true,
        'job' => true,
    ];
}
