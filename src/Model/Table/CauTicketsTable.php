<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CauTickets Model
 *
 * @property \App\Model\Table\TypeTicketsTable|\Cake\ORM\Association\BelongsTo $TypeTickets
 * @property \App\Model\Table\JumboclTicketsTable|\Cake\ORM\Association\HasMany $JumboclTickets
 *
 * @method \App\Model\Entity\CauTicket get($primaryKey, $options = [])
 * @method \App\Model\Entity\CauTicket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CauTicket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CauTicket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CauTicket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CauTicket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CauTicket findOrCreate($search, callable $callback = null, $options = [])
 */
class CauTicketsTable extends Table
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

        $this->setTable('cau_tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TypeTickets', [
            'foreignKey' => 'type_ticket_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('JumboclTickets', [
            'foreignKey' => 'cau_ticket_id'
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
            ->integer('cau')
            ->requirePresence('cau', 'create')
            ->notEmpty('cau');

        $validator
            ->dateTime('open_date')
            ->requirePresence('open_date', 'create')
            ->notEmpty('open_date');

        $validator
            ->dateTime('answer_date')
            ->requirePresence('answer_date', 'create')
            ->notEmpty('answer_date');

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
        $rules->add($rules->existsIn(['type_ticket_id'], 'TypeTickets'));

        return $rules;
    }
}
