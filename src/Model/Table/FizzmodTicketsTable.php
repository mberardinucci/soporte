<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FizzmodTickets Model
 *
 * @property \App\Model\Table\PrioritiesTable|\Cake\ORM\Association\BelongsTo $Priorities
 * @property \App\Model\Table\TicketsTable|\Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\FizzmodTicket get($primaryKey, $options = [])
 * @method \App\Model\Entity\FizzmodTicket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FizzmodTicket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FizzmodTicket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FizzmodTicket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FizzmodTicket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FizzmodTicket findOrCreate($search, callable $callback = null, $options = [])
 */
class FizzmodTicketsTable extends Table
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

        $this->setTable('fizzmod_tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Priorities', [
            'foreignKey' => 'priority_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Tickets', [
            'foreignKey' => 'fizzmod_ticket_id'
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
            ->scalar('id_fizz')
            ->maxLength('id_fizz', 100)
            ->requirePresence('id_fizz', 'create')
            ->notEmpty('id_fizz');

        $validator
            ->dateTime('open_date')
            ->requirePresence('open_date', 'create')
            ->notEmpty('open_date');

        $validator
            ->dateTime('resolution_date')
            ->requirePresence('resolution_date', 'create')
            ->notEmpty('resolution_date');

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
        $rules->add($rules->existsIn(['priority_id'], 'Priorities'));

        return $rules;
    }
}
