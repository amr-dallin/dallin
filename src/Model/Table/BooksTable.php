<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\BookCategoriesTable|\Cake\ORM\Association\BelongsTo $BookCategories
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksTable extends Table
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

        $this->setTable('books');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('BookCategories', [
            'foreignKey' => 'book_category_id',
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
            ->scalar('author')
            ->maxLength('author', 255)
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->scalar('date_publication')
            ->notEmpty('date_publication');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 50)
            ->allowEmpty('isbn');

        $validator
            ->scalar('body')
            ->allowEmpty('body');

        $validator
            ->date('date_readed')
            ->allowEmpty('date_readed');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['book_category_id'], 'BookCategories'));

        return $rules;
    }
}
