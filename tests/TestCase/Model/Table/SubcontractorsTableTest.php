<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubcontractorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubcontractorsTable Test Case
 */
class SubcontractorsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SubcontractorsTable
     */
    public $Subcontractors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subcontractors',
        'app.Contracts',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subcontractors') ? [] : ['className' => SubcontractorsTable::class];
        $this->Subcontractors = TableRegistry::getTableLocator()->get('Subcontractors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subcontractors);

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
}
