<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('budgets', ['collation' => 'utf8_general_ci'])
            ->addColumn('resources', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('expenses', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => true,
            ])
            ->addColumn('project_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('department_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'project_id',
                ]
            )
            ->addIndex(
                [
                    'department_id',
                ]
            )
            ->create();

        $this->table('companies', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('contracts', ['collation' => 'utf8_general_ci'])
            ->addColumn('type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('start_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('worker_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('subcontractor_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'worker_id',
                ]
            )
            ->addIndex(
                [
                    'subcontractor_id',
                ]
            )
            ->create();

        $this->table('departments', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('company_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'company_id',
                ]
            )
            ->create();

        $this->table('jobs', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('basic_salary', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('department_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'department_id',
                ]
            )
            ->create();

        $this->table('projects', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('start_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('end_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('expected_profit', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->create();

        $this->table('projects_subcontractors', ['collation' => 'utf8_general_ci'])
            ->addColumn('project_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('subcontractor_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'project_id',
                ]
            )
            ->addIndex(
                [
                    'subcontractor_id',
                ]
            )
            ->create();

        $this->table('projects_workers', ['collation' => 'utf8_general_ci'])
            ->addColumn('project_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('worker_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('settlements', ['collation' => 'utf8_general_ci'])
            ->addColumn('charge', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('payment_due', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('contract_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('budget_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'budget_id',
                ]
            )
            ->addIndex(
                [
                    'contract_id',
                ]
            )
            ->create();

        $this->table('staffs', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('income', 'decimal', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('department_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'department_id',
                ]
            )
            ->create();

        $this->table('subcontractors', ['collation' => 'utf8_general_ci'])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('service_type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->create();

        $this->table('workers', ['collation' => 'utf8_general_ci'])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('pesel', 'string', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('staff_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => z,
            ])
            ->addIndex(
                [
                    'pesel',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'staff_id',
                ]
            )
            ->create();

        $this->table('workers_jobs', ['collation' => 'utf8_general_ci'])
            ->addColumn('worker_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('job_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addIndex(
                [
                    'worker_id',
                ]
            )
            ->addIndex(
                [
                    'job_id',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->table('budgets')->drop()->save();
        $this->table('companies')->drop()->save();
        $this->table('contracts')->drop()->save();
        $this->table('departments')->drop()->save();
        $this->table('jobs')->drop()->save();
        $this->table('projects')->drop()->save();
        $this->table('projects_subcontractors')->drop()->save();
        $this->table('projects_workers')->drop()->save();
        $this->table('settlements')->drop()->save();
        $this->table('staffs')->drop()->save();
        $this->table('subcontractors')->drop()->save();
        $this->table('workers')->drop()->save();
        $this->table('workers_jobs')->drop()->save();
    }
}
