<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImagesBiensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImagesBiensTable Test Case
 */
class ImagesBiensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImagesBiensTable
     */
    public $ImagesBiens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.images_biens',
        'app.images',
        'app.biens',
        'app.secteurs',
        'app.towns',
        'app.dpes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ImagesBiens') ? [] : ['className' => 'App\Model\Table\ImagesBiensTable'];
        $this->ImagesBiens = TableRegistry::get('ImagesBiens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ImagesBiens);

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
