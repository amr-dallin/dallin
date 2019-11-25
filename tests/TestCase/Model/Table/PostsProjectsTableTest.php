<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsProjectsTable Test Case
 */
class PostsProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsProjectsTable
     */
    public $PostsProjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.posts_projects',
        'app.posts',
        'app.projects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PostsProjects') ? [] : ['className' => PostsProjectsTable::class];
        $this->PostsProjects = TableRegistry::getTableLocator()->get('PostsProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PostsProjects);

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
