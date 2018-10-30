<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PostsTagsFixture
 *
 */
class PostsTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 255, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'post_id' => ['type' => 'integer', 'length' => 255, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'tag_id' => ['type' => 'integer', 'length' => 255, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tag_id__INDEX' => ['type' => 'index', 'columns' => ['tag_id'], 'length' => []],
            'post_id__INDEX' => ['type' => 'index', 'columns' => ['post_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_posts__id____posts_tags__post_id' => ['type' => 'foreign', 'columns' => ['post_id'], 'references' => ['posts', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'fk_tags__id____posts_tags__tag_id' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'post_id' => 1,
                'tag_id' => 1
            ],
        ];
        parent::init();
    }
}
