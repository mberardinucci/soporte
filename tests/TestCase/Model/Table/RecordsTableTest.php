<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RecordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RecordsTable Test Case
 */
class RecordsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RecordsTable
     */
    public $Records;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.records',
        'app.users',
        'app.jumbocl_tickets',
        'app.causes',
        'app.cau_tickets',
        'app.type_tickets',
        'app.tickets',
        'app.states',
        'app.countries',
        'app.fizzmod_tickets',
        'app.priorities',
        'app.ticket_fizzmods',
        'app.ticket_vtexs',
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
        $config = TableRegistry::exists('Records') ? [] : ['className' => RecordsTable::class];
        $this->Records = TableRegistry::get('Records', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Records);

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
