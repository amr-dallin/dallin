<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookCategories Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\HasMany $Books
 *
 * @method \App\Model\Entity\BookCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookCategory|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class BookCategoriesTable extends Table
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

        $this->setTable('book_categories');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Books', [
            'foreignKey' => 'book_category_id'
        ]);
        
        $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
                    'date_created' => 'new',
                    'date_modified' => 'always',
                ]
            ]
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
            ->scalar('alias')
            ->maxLength('alias', 255)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
