<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProjectsSubcontractors Model
 *
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\SubcontractorsTable&\Cake\ORM\Association\BelongsTo $Subcontractors
 *
 * @method \App\Model\Entity\ProjectsSubcontractor get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProjectsSubcontractor findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsSubcontractorsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('projects_subcontractors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Subcontractors', [
            'foreignKey' => 'subcontractor_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['subcontractor_id'], 'Subcontractors'));

        return $rules;
    }
}
