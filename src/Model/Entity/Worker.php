<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Worker Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $pesel
 * @property int $staff_id
 *
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\Project[] $projects
 * @property \App\Model\Entity\Job[] $jobs
 */
class Worker extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'pesel' => true,
        'staff_id' => true,
        'staff' => true,
        'contracts' => true,
        'projects' => true,
        'jobs' => true,
    ];

    protected function _getFullName() {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }
}
