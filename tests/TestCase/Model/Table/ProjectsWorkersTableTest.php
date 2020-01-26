<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsWorkersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsWorkersTable Test Case
 */
class ProjectsWorkersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsWorkersTable
     */
    public $ProjectsWorkers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectsWorkers',
        'app.Projects',
        'app.Workers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectsWorkers') ? [] : ['className' => ProjectsWorkersTable::class];
        $this->ProjectsWorkers = TableRegistry::getTableLocator()->get('ProjectsWorkers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsWorkers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
