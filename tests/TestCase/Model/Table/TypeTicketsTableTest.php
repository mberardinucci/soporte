<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeTicketsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeTicketsTable Test Case
 */
class TypeTicketsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeTicketsTable
     */
    public $TypeTickets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_tickets',
        'app.cau_tickets'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeTickets') ? [] : ['className' => TypeTicketsTable::class];
        $this->TypeTickets = TableRegistry::get('TypeTickets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeTickets);

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
