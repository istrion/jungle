<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BiensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BiensTable Test Case
 */
class BiensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BiensTable
     */
    public $Biens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.biens',
        'app.secteurs',
        'app.villes',
        'app.dpes',
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
        $config = TableRegistry::exists('Biens') ? [] : ['className' => 'App\Model\Table\BiensTable'];
        $this->Biens = TableRegistry::get('Biens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Biens);

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
