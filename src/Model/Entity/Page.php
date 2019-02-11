<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $body
 * @property string $meta_keywords
 * @property string $meta_description
 * @property bool $home
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property bool $published
 */
class Page extends Entity
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
        'body' => true,
        'image' => true,
        'meta_keywords' => true,
        'meta_description' => true,
        'date_created' => true,
        'date_modified' => true,
        'systemic' => true,
        'published' => true
    ];
}
