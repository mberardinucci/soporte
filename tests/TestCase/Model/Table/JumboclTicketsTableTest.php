<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JumboclTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JumboclTicketsTable Test Case
 */
class JumboclTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JumboclTicketsTable
     */
    public $JumboclTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jumbocl_tickets',
        'app.causes',
        'app.users',
        'app.cau_tickets',
        'app.type_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JumboclTickets') ? [] : ['className' => JumboclTicketsTable::class];
        $this->JumboclTickets = TableRegistry::get('JumboclTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JumboclTickets);

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
