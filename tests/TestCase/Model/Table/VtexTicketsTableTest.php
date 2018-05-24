<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VtexTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VtexTicketsTable Test Case
 */
class VtexTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VtexTicketsTable
     */
    public $VtexTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vtex_tickets',
        'app.priorities',
        'app.ticket_fizzmods',
        'app.ticket_vtexs',
        'app.tickets',
        'app.users',
        'app.jumbocl_tickets',
        'app.causes',
        'app.cau_tickets',
        'app.type_tickets',
        'app.states',
        'app.countries',
        'app.fizzmod_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VtexTickets') ? [] : ['className' => VtexTicketsTable::class];
        $this->VtexTickets = TableRegistry::get('VtexTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VtexTickets);

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
