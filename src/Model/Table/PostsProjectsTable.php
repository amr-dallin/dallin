<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostsProjects Model
 *
 * @property \App\Model\Table\PostsTable|\Cake\ORM\Association\BelongsTo $Posts
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 *
 * @method \App\Model\Entity\PostsProject get($primaryKey, $options = [])
 * @method \App\Model\Entity\PostsProject newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PostsProject[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PostsProject|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostsProject|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostsProject patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PostsProject[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PostsProject findOrCreate($search, callable $callback = null, $options = [])
 */
class PostsProjectsTable extends Table
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

        $this->setTable('posts_projects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['post_id'], 'Posts'));
        $rules->add($rules->existsIn(['project_id'], 'Projects'));

        return $rules;
    }
}
