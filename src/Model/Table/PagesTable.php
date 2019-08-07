<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Pages Model
 *
 * @method \App\Model\Entity\Page get($primaryKey, $options = [])
 * @method \App\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Page|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagesTable extends Table
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

        $this->setTable('pages');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always',
                ]
            ]
        ]);

        $this->hasOne('Image', [
            'className' => 'Burzum/FileStorage.FileStorage',
            'foreignKey' => 'foreign_key',
            'conditions' => ['Image.model' => 'PageImages'],
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
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->allowEmpty('body');

        $validator
            ->scalar('meta_keywords')
            ->maxLength('meta_keywords', 255)
            ->allowEmpty('meta_keywords');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 255)
            ->allowEmpty('meta_description');

        return $validator;
    }

    public function findType(Query $query, array $options)
    {
        return $query
            ->where(['Pages.systemic' => $options['systemic']]);
    }

    public function findAllPublished(Query $query, array $options)
    {
        return $query
            ->where([
                'Pages.systemic' => false,
                'Pages.published' => true
            ]);
    }

    public function findPublished(Query $query, array $options)
    {
        return $this->find('allPublished')
            ->where(['Pages.slug' => $options['slug']]);
    }

    public function tagged($slug)
    {
        $tagged = [];
        $records = ['books', 'posts', 'projects'];
        foreach($records as $record) {
            ${$record . 'Table'} = TableRegistry::getTableLocator()->get(Inflector::camelize($record));
            ${$record} = ${$record . 'Table'}->find('tagged', [
                'tag' => $slug,
            ])->toArray();

            $key = 0;
            foreach(${$record} as ${Inflector::singularize($record)}) {
                if (${Inflector::singularize($record)}->published) {
                    $tagged[$record][$key] = [
                        'id' => ${Inflector::singularize($record)}->id,
                        'alias' => ${Inflector::singularize($record)}->alias,
                        'title' => ${Inflector::singularize($record)}->title
                    ];

                    $key++;
                }
            }
        }

        return $tagged;
    }
}