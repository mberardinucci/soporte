<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TicketFizzmodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TicketFizzmodsTable Test Case
 */
class TicketFizzmodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TicketFizzmodsTable
     */
    public $TicketFizzmods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ticket_fizzmods',
        'app.priorities',
        'app.ticket_vtexs',
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
        $config = TableRegistry::exists('TicketFizzmods') ? [] : ['className' => TicketFizzmodsTable::class];
        $this->TicketFizzmods = TableRegistry::get('TicketFizzmods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TicketFizzmods);

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
