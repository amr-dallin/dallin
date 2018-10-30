<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookCategory Entity
 *
 * @property int $id
 * @property string $alias
 * @property string $title
 * @property \Cake\I18n\FrozenTime $date_created
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \App\Model\Entity\Book[] $books
 */
class BookCategory extends Entity
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
        'alias' => true,
        'title' => true,
        'date_created' => true,
        'date_modified' => true,
        'books' => true
    ];
}
