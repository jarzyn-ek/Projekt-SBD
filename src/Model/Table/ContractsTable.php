<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contracts Model
 *
 * @property \App\Model\Table\WorkersTable&\Cake\ORM\Association\BelongsTo $Workers
 * @property \App\Model\Table\SubcontractorsTable&\Cake\ORM\Association\BelongsTo $Subcontractors
 * @property \App\Model\Table\SettlementsTable&\Cake\ORM\Association\HasMany $Settlements
 *
 * @method \App\Model\Entity\Contract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contract|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contract findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractsTable extends Table
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

        $this->setTable('contracts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Workers', [
            'foreignKey' => 'worker_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Subcontractors', [
            'foreignKey' => 'subcontractor_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Settlements', [
            'foreignKey' => 'contract_id',
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
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDateTime('start_date');

        $validator
            ->dateTime('end_date')
            ->allowEmptyDateTime('end_date');

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
        $rules->add($rules->existsIn(['subcontractor_id'], 'Subcontractors'));

        return $rules;
    }
}
