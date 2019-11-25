<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\BelongsToMany $Posts
 * @property \Tags\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\Project get($primaryKey, $options = [])
 * @method \App\Model\Entity\Project newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Project[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Project|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Project patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Project[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Project findOrCreate($search, callable $callback = null, $options = [])
 * @property \Cake\ORM\Table|\Cake\ORM\Association\HasMany $PostsProjects
 * @property \Tags\Model\Table\TaggedTable|\Cake\ORM\Association\HasMany $Tagged
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Tags\Model\Behavior\TagBehavior
 */
class ProjectsTable extends Table
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

        $this->setTable('projects');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Posts', [
            'foreignKey' => 'project_id'
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
            'conditions' => ['Image.model' => 'ProjectImages'],
            'cascadeCallbacks' => true,
            'dependent' => true
        ]);
    }

    public function buildValidator(Event $event, Validator $validator, $name)
    {
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
            ->requirePresence('published', 'create')
            ->notEmpty('published');

        return $validator;
    }

    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        if (!empty($entity->image->file)) {
            $entity->image->set('model', 'ProjectImages');
        }
    }

    public function findAllPublished(Query $query, array $options)
    {
        return $query
            ->where(['Projects.published' => true])
            ->order(['Projects.weight' => 'DESC', 'Projects.id' => 'DESC'])
            ->contain('Tags');
    }

    public function findPublished(Query $query, array $options)
    {
        return $query
            ->where([
                'Projects.slug' => $options['slug'],
                'Projects.published' => true
            ]);
    }
}