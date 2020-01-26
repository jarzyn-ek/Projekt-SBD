<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subcontractor Entity
 *
 * @property int $id
 * @property string $name
 * @property string $service_type
 *
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\Project[] $projects
 */
class Subcontractor extends Entity
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
        'service_type' => true,
        'contracts' => true,
        'projects' => true,
    ];
}
