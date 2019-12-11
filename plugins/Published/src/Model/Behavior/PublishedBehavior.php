<?php
namespace Published\Model\Behavior;

use Cake\ORM\Query;
use Cake\ORM\Behavior;
use Cake\ORM\Table;
use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;

/**
 * Published behavior
 */
class PublishedBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'implementedMethods' => [
            'changePublished' => 'changePublished'
        ],
        'implementedFinders' => [
            'published' => 'findPublished',
        ]
    ];

    /**
     * Initialize method
     *
     * @param array $config Configuration options
     * @return void
     */
    public function initialize(array $config)
    {
        $this->_table->hasOne('Published', [
            'className' => 'Published.PublicationModes',
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'Published.model' => $this->_table->getAlias()
            ],
            'cascadeCallbacks' => true,
            'dependent' => true
        ]);
    }

    /**
     * Before Save Callback
     *
     * @param Cake/Event/Event $event The afterSave event that was fired.
     * @param Cake/ORM/Entity $entity The entity
     * @param ArrayObject $options Options
     * @return void
     */
    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        if ($entity->isNew()) {
            $entity->published->set('model', $this->_table->getAlias());
        }
    }

    public function findPublished(Query $query, Array $options)
    {
        return $query
            ->innerJoinWith('Published', function($q) {
                return $q
                    ->where([
                        'model' => $this->_table->getAlias(),
                        'mode' => true
                    ]);
            });
    }
}
