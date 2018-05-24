<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Causes Model
 *
 * @property \App\Model\Table\JumboclTicketsTable|\Cake\ORM\Association\HasMany $JumboclTickets
 *
 * @method \App\Model\Entity\Cause get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cause newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cause[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cause|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cause patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cause[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cause findOrCreate($search, callable $callback = null, $options = [])
 */
class CausesTable extends Table
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

        $this->setTable('causes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('JumboclTickets', [
            'foreignKey' => 'cause_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
