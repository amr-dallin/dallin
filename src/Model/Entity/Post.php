<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $lead
 * @property string $body
 * @property string $cover
 * @property string $meta_keywords
 * @property string $meta_description
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property \Tags\Model\Entity\Tagged[] $tagged
 * @property \Tags\Model\Entity\Tag[] $tags
 */
class Post extends Entity
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
        'project_id' => true,
        'service_id' => true,
        'title' => true,
        'slug' => true,
        'lead' => true,
        'body' => true,
        'date_created' => true,
        'date_modified' => true,
        'project' => true,
        'service' => true,
        'meta_tags' => true,
        'published' => true
    ];
}
