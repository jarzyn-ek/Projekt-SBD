<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkersJobs Model
 *
 * @property \App\Model\Table\WorkersTable&\Cake\ORM\Association\BelongsTo $Workers
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 *
 * @method \App\Model\Entity\WorkersJob get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkersJob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkersJob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkersJob|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkersJob saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkersJob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkersJob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkersJob findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkersJobsTable extends Table
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

        $this->setTable('workers_jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Workers', [
            'foreignKey' => 'worker_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
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
        $rules->add($rules->existsIn(['worker_id'], 'Workers'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));

        return $rules;
    }
}
