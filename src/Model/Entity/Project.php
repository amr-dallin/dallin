<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $body
 * @property string $meta_keywords
 * @property string $meta_description
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \App\Model\Entity\Post[] $posts
 * @property \Tags\Model\Entity\Tag[] $tags
 * @property \Tags\Model\Entity\Tagged[] $tagged
 */
class Project extends Entity
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
        'title' => true,
        'slug' => true,
        'lead' => true,
        'body' => true,
        'url' => true,
        'weight' => true,
        'date_created' => true,
        'date_modified' => true,
        'posts' => true,
        'meta_tags' => true,
        'published' => true
    ];
}
