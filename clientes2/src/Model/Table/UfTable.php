<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uf Model
 *
 * @method \App\Model\Entity\Uf get($primaryKey, $options = [])
 * @method \App\Model\Entity\Uf newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Uf[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Uf|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uf saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Uf[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Uf findOrCreate($search, callable $callback = null, $options = [])
 */
class UfTable extends Table
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

        $this->setTable('uf');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('UF')
            ->maxLength('UF', 2)
            ->notEmptyString('UF');

        return $validator;
    }
}
