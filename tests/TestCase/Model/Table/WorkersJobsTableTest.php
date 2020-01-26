<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkersJobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkersJobsTable Test Case
 */
class WorkersJobsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkersJobsTable
     */
    public $WorkersJobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.WorkersJobs',
        'app.Workers',
        'app.Jobs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('WorkersJobs') ? [] : ['className' => WorkersJobsTable::class];
        $this->WorkersJobs = TableRegistry::getTableLocator()->get('WorkersJobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkersJobs);

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
