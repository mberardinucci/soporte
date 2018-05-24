<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketVtexsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketVtexsTable Test Case
 */
class TicketVtexsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketVtexsTable
     */
    public $TicketVtexs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_vtexs',
        'app.priorities',
        'app.ticket_fizzmods',
        'app.tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TicketVtexs') ? [] : ['className' => TicketVtexsTable::class];
        $this->TicketVtexs = TableRegistry::get('TicketVtexs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketVtexs);

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
