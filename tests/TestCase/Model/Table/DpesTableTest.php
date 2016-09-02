<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DpesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DpesTable Test Case
 */
class DpesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DpesTable
     */
    public $Dpes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dpes',
        'app.biens',
        'app.secteurs',
        'app.towns',
        'app.agents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dpes') ? [] : ['className' => 'App\Model\Table\DpesTable'];
        $this->Dpes = TableRegistry::get('Dpes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dpes);

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
