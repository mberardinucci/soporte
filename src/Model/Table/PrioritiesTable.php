<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Priorities Model
 *
 * @property \App\Model\Table\TicketFizzmodsTable|\Cake\ORM\Association\HasMany $TicketFizzmods
 * @property \App\Model\Table\TicketVtexsTable|\Cake\ORM\Association\HasMany $TicketVtexs
 *
 * @method \App\Model\Entity\Priority get($primaryKey, $options = [])
 * @method \App\Model\Entity\Priority newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Priority[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Priority|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Priority patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Priority[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Priority findOrCreate($search, callable $callback = null, $options = [])
 */
class PrioritiesTable extends Table
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

        $this->setTable('priorities');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('TicketFizzmods', [
            'foreignKey' => 'priority_id'
        ]);
        $this->hasMany('TicketVtexs', [
            'foreignKey' => 'priority_id'
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

        $validator
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        return $validator;
    }
}
