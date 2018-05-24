<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CausesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CausesTable Test Case
 */
class CausesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CausesTable
     */
    public $Causes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.causes',
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
        $config = TableRegistry::exists('Causes') ? [] : ['className' => CausesTable::class];
        $this->Causes = TableRegistry::get('Causes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Causes);

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
