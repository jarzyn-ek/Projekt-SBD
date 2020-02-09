<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workers Model
 *
 * @property \App\Model\Table\StaffsTable&\Cake\ORM\Association\BelongsTo $Staffs
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsToMany $Projects
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsToMany $Jobs
 *
 * @method \App\Model\Entity\Worker get($primaryKey, $options = [])
 * @method \App\Model\Entity\Worker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Worker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Worker|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Worker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Worker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Worker findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkersTable extends Table
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

        $this->setTable('workers');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Staffs', [
            'foreignKey' => 'staff_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'worker_id',
        ]);
        $this->belongsToMany('Projects', [
            'foreignKey' => 'worker_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'projects_workers',
        ]);
        $this->belongsToMany('Jobs', [
            'foreignKey' => 'worker_id',
            'targetForeignKey' => 'job_id',
            'joinTable' => 'workers_jobs',
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
            ->scalar('first_name')
            ->maxLength('first_name', 255)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 255)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->scalar('pesel')
            ->minLength('pesel', 11)
            ->maxLength('pesel', 11)
            ->requirePresence('pesel', 'create')
            ->notEmptyString('pesel')
            ->add('pesel', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->add('pesel', 'custom', ['rule' => function ($value) {
                $reg = '/^[0-9]{11}$/';

                if (preg_match($reg, $value) == false)
                    return false;
                else {
                    $digits = str_split($value);
                    if ((intval(substr($value, 4, 2)) > 31) || (intval(substr($value, 2, 2)) > 12))
                        return false;
                    $checksum = (1 * intval($digits[0]) + 3 * intval($digits[1]) + 7 * intval($digits[2]) + 9 * intval($digits[3]) + 1 * intval($digits[4]) + 3 * intval($digits[5]) + 7 * intval($digits[6]) + 9 * intval($digits[7]) + 1 * intval($digits[8]) + 3 * intval($digits[9])) % 10;
                    if ($checksum == 0)
                        $checksum = 10;
                    $checksum = 10 - $checksum;

                    return (intval($digits[10]) == $checksum);
                }

                return false;
            }, 'message' => 'This is not a valid PESEL']);

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
        $rules->add($rules->isUnique(['pesel']));
        $rules->add($rules->existsIn(['staff_id'], 'Staffs'));

        return $rules;
    }
}
