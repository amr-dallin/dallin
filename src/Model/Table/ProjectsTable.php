<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

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

        $this->belongsToMany('Posts', [
            'foreignKey' => 'project_id',
            'targetForeignKey' => 'post_id',
            'joinTable' => 'posts_projects'
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
            ->scalar('alias')
            ->maxLength('alias', 255)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->scalar('cover')
            ->maxLength('cover', 255)
            ->requirePresence('cover', 'create')
            ->notEmpty('cover');

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
}
