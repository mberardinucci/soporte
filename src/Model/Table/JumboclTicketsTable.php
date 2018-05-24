<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JumboclTickets Model
 *
 * @property \App\Model\Table\CausesTable|\Cake\ORM\Association\BelongsTo $Causes
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CauTicketsTable|\Cake\ORM\Association\BelongsTo $CauTickets
 *
 * @method \App\Model\Entity\JumboclTicket get($primaryKey, $options = [])
 * @method \App\Model\Entity\JumboclTicket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JumboclTicket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JumboclTicket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JumboclTicket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JumboclTicket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JumboclTicket findOrCreate($search, callable $callback = null, $options = [])
 */
class JumboclTicketsTable extends Table
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

        $this->setTable('jumbocl_tickets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Causes', [
            'foreignKey' => 'cause_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CauTickets', [
            'foreignKey' => 'cau_ticket_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        /**$validator
            ->scalar('op')
            ->maxLength('op', 7)
            ->requirePresence('op', 'create');**/

        $validator
            ->scalar('comments')
            ->requirePresence('comments', 'create');

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
        $rules->add($rules->existsIn(['cause_id'], 'Causes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['cau_ticket_id'], 'CauTickets'));

        return $rules;
    }
}
