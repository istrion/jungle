<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExclusivitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExclusivitiesTable Test Case
 */
class ExclusivitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExclusivitiesTable
     */
    public $Exclusivities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exclusivities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Exclusivities') ? [] : ['className' => 'App\Model\Table\ExclusivitiesTable'];
        $this->Exclusivities = TableRegistry::get('Exclusivities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Exclusivities);

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
