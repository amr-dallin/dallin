<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $book_category_id
 * @property string $title
 * @property string $alias
 * @property string $author
 * @property string $year
 * @property string $isbn
 * @property string $body
 * @property bool $readed
 * @property \Cake\I18n\FrozenDate $date_readed
 * @property string $meta_keywords
 * @property string $meta_description
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property bool $published
 *
 * @property \App\Model\Entity\BookCategory $book_category
 */
class Book extends Entity
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
        'book_category_id' => true,
        'title' => true,
        'alias' => true,
        'author' => true,
        'year' => true,
        'isbn' => true,
        'body' => true,
        'date_publication' => true,
        'cover' => true,
        'date_readed' => true,
        'meta_keywords' => true,
        'meta_description' => true,
        'date_created' => true,
        'date_modified' => true,
        'published' => true,
        'book_category' => true
    ];
}
