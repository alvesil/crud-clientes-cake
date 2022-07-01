<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Endereco Model
 *
 * @method \App\Model\Entity\Endereco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Endereco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Endereco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Endereco|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco findOrCreate($search, callable $callback = null, $options = [])
 */
class EnderecoTable extends Table
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

        $this->setTable('endereco');
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
            ->integer('fk_id_cliente')
            ->requirePresence('fk_id_cliente', 'create')
            ->notEmptyString('fk_id_cliente');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 60)
            ->notEmptyString('endereco');

        $validator
            ->notEmptyString('numero');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 50)
            ->notEmptyString('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 45)
            ->notEmptyString('bairro');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 8)
            ->notEmptyString('cep');

        $validator
            ->integer('fk_id_uf')
            ->requirePresence('fk_id_uf', 'create')
            ->notEmptyString('fk_id_uf');

        $validator
            ->integer('fk_id_cidade')
            ->requirePresence('fk_id_cidade', 'create')
            ->notEmptyString('fk_id_cidade');

        $validator
            ->date('dt_cadastro')
            ->requirePresence('dt_cadastro', 'create')
            ->notEmptyDate('dt_cadastro');

        return $validator;
    }
}
