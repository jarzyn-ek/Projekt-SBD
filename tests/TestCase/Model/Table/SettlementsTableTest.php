<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettlementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SettlementsTable Test Case
 */
class SettlementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SettlementsTable
     */
    public $Settlements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Settlements',
        'app.Contracts',
        'app.Budgets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Settlements') ? [] : ['className' => SettlementsTable::class];
        $this->Settlements = TableRegistry::getTableLocator()->get('Settlements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Settlements);

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
