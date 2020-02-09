<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staff Entity
 *
 * @property int $id
 * @property string $name
 * @property float $income
 * @property int $department_id
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Worker[] $workers
 */
class Staff extends Entity
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
        'income' => true,
        'department_id' => true,
        'department' => true,
        'workers' => true,
    ];

    protected function _getIdName()
    {
        return $this->_properties['id'] . ': ' . $this->_properties['name'];
    }
}
