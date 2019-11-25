<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * Posts Model
 *
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, callable $callback = null, $options = [])
 * @property \Tags\Model\Table\TaggedTable|\Cake\ORM\Association\HasMany $Tagged
 * @property \Tags\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Tags\Model\Behavior\TagBehavior
 */
class PostsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always',
                ]
            ]
        ]);

        $this->addBehavior('Tags.Tag', ['taggedCounter' => false]);

        $this->hasOne('Image', [
            'className' => 'Burzum/FileStorage.FileStorage',
            'foreignKey' => 'foreign_key',
            'conditions' => ['Image.model' => 'PostImages'],
            'cascadeCallbacks' => true,
            'dependent' => true
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('heading')
            ->maxLength('heading', 255)
            ->requirePresence('heading', 'create')
            ->notEmpty('heading');

        $validator
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmpty('slug');

        $validator
            ->scalar('lead')
            ->requirePresence('lead', 'create')
            ->notEmpty('lead');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->scalar('meta_keywords')
            ->maxLength('meta_keywords', 255)
            ->allowEmpty('meta_keywords');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 255)
            ->allowEmpty('meta_description');

        $validator
            ->boolean('published')
            ->notEmpty('published');

        return $validator;
    }

    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        if (!empty($entity->image->file)) {
            $entity->image->set('model', 'PostImages');
        }
    }

    public function findAllPublished(Query $query, array $options)
    {
        return $query
            ->where(['Posts.published' => true])
            ->order(['Posts.id' => 'DESC'])
            ->contain('Tags');
    }

    public function findPublished(Query $query, array $options)
    {
        return $query
            ->where([
                'Posts.slug' => $options['slug'],
                'Posts.published' => true
            ])
            ->contain('Tags');
    }

    public function findTaggedAllPublished(Query $query, array $options)
    {
        return $this
            ->find('allPublished')
            ->find('tagged', ['tag' => $options['slug']]);
    }
}