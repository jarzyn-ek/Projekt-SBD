<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subcontractors Model
 *
 * @property \App\Model\Table\ContractsTable&\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\ProjectsTable&\Cake\ORM\Association\BelongsToMany $Projects
 *
 * @method \App\Model\Entity\Subcontractor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Subcontractor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Subcontractor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subcontractor saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Subcontractor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Subcontractor findOrCreate($search, callable $callback = null, $options = [])
 */
class SubcontractorsTable extends Table
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

        $this->setTable('subcontractors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Contracts', [
            'foreignKey' => 'subcontractor_id',
        ]);
        $this->belongsToMany('Projects', [
            'foreignKey' => 'subcontractor_id',
            'targetForeignKey' => 'project_id',
            'joinTable' => 'projects_subcontractors',
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
            ->scalar('service_type')
            ->maxLength('service_type', 255)
            ->requirePresence('service_type', 'create')
            ->notEmptyString('service_type');

        return $validator;
    }
}
