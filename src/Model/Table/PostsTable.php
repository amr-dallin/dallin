<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;
use Cake\Database\Expression\QueryExpression;
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
            'foreignKey' => 'project_id'
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id'
        ]);

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always',
                ]
            ]
        ]);
        $this->addBehavior('Tags.Tag', ['taggedCounter' => false, 'strategy' => 'array']);
        $this->addBehavior('Meta.Meta');
        $this->addBehavior('Muffin/Slug.Slug');
        $this->addBehavior('Published.Published');
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
            ->scalar('lead')
            ->requirePresence('lead', 'create')
            ->notEmpty('lead');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        return $validator;
    }

    public function beforeFind($event, $query, $options, $primary)
    {
        $order = $query->clause('order');
        if ($order === null || !count($order)) {
            $query->order([
                $this->aliasField('id') => 'DESC'
            ]);
        }
    }

    public function tagList($search)
    {
        $query = $this->Tagged->Tags->find();
        $tags = $query
            ->where(function (QueryExpression $exp, Query $q) use ($search) {
                return $exp->like('Tags.label', '%' . $search . '%');
            });

        $data = [];
        foreach($tags as $key => $tag) {
            $data[] = [
                'id' => $tag->label,
                'text' => $tag->label
            ];
        }

        return $data;
    }


    public function findByService(Query $query, Array $options)
    {
        return $query
            ->where(
                ['Posts.service_id' => $options['service_id']]
            );
    }
}