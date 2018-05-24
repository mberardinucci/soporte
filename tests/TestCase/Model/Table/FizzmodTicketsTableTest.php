<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FizzmodTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FizzmodTicketsTable Test Case
 */
class FizzmodTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FizzmodTicketsTable
     */
    public $FizzmodTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fizzmod_tickets',
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
        'app.vtex_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FizzmodTickets') ? [] : ['className' => FizzmodTicketsTable::class];
        $this->FizzmodTickets = TableRegistry::get('FizzmodTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FizzmodTickets);

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
