<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CauTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CauTicketsTable Test Case
 */
class CauTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CauTicketsTable
     */
    public $CauTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cau_tickets',
        'app.type_tickets',
        'app.jumbocl_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CauTickets') ? [] : ['className' => CauTicketsTable::class];
        $this->CauTickets = TableRegistry::get('CauTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CauTickets);

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
