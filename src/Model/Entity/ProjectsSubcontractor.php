<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProjectsSubcontractor Entity
 *
 * @property int $id
 * @property int $project_id
 * @property int $subcontractor_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Subcontractor $subcontractor
 */
class ProjectsSubcontractor extends Entity
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
        'project_id' => true,
        'subcontractor_id' => true,
        'project' => true,
        'subcontractor' => true,
    ];
}
