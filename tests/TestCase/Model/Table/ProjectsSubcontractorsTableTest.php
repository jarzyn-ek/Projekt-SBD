<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsSubcontractorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsSubcontractorsTable Test Case
 */
class ProjectsSubcontractorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsSubcontractorsTable
     */
    public $ProjectsSubcontractors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProjectsSubcontractors',
        'app.Projects',
        'app.Subcontractors',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectsSubcontractors') ? [] : ['className' => ProjectsSubcontractorsTable::class];
        $this->ProjectsSubcontractors = TableRegistry::getTableLocator()->get('ProjectsSubcontractors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsSubcontractors);

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
