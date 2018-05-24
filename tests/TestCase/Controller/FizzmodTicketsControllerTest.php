<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FizzmodTicketsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FizzmodTicketsController Test Case
 */
class FizzmodTicketsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
