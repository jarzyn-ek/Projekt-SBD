<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\BudgetsTable&\Cake\ORM\Association\HasMany $Budgets
 * @property \App\Model\Table\SubcontractorsTable&\Cake\ORM\Association\BelongsToMany $Subcontractors
 * @property \App\Model\Table\WorkersTable&\Cake\ORM\Association\BelongsToMany $Workers
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Budgets', [
            'foreignKey' => 'project_id',
        ]);
        $this->belongsToMany('Subcontractors', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'subcontractor_id',
            'joinTable' => 'projects_subcontractors',
        ]);
        $this->belongsToMany('Workers', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'worker_id',
            'joinTable' => 'projects_workers',
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

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDateTime('start_date');

        $validator
            ->dateTime('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDateTime('end_date');

        $validator
            ->decimal('expected_profit')
            ->requirePresence('expected_profit', 'create')
            ->notEmptyString('expected_profit');

        return $validator;
    }
}
