<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProjectsTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProjectsTagsTable Test Case
 */
class ProjectsTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProjectsTagsTable
     */
    public $ProjectsTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.projects_tags',
        'app.projects',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProjectsTags') ? [] : ['className' => ProjectsTagsTable::class];
        $this->ProjectsTags = TableRegistry::getTableLocator()->get('ProjectsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProjectsTags);

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
