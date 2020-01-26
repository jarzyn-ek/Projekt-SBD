<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property int $id
 * @property string $name
 * @property int $company_id
 *
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\Budget[] $budgets
 * @property \App\Model\Entity\Job[] $jobs
 * @property \App\Model\Entity\Staff[] $staffs
 */
class Department extends Entity
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
        'company_id' => true,
        'company' => true,
        'budgets' => true,
        'jobs' => true,
        'staffs' => true,
    ];
}
