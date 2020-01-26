<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Budget Entity
 *
 * @property int $id
 * @property float $resources
 * @property float|null $expenses
 * @property int $project_id
 * @property int $department_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Settlement[] $settlements
 */
class Budget extends Entity
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
        'resources' => true,
        'expenses' => true,
        'project_id' => true,
        'department_id' => true,
        'project' => true,
        'department' => true,
        'settlements' => true,
    ];
}
