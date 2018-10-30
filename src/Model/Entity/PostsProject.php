<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostsProject Entity
 *
 * @property int $id
 * @property int $post_id
 * @property int $project_id
 *
 * @property \App\Model\Entity\Post $post
 * @property \App\Model\Entity\Project $project
 */
class PostsProject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'post_id' => true,
        'project_id' => true,
        'post' => true,
        'project' => true
    ];
}
