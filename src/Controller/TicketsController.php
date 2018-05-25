<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 *
 * @method \App\Model\Entity\Ticket[] paginate($object = null, array $settings = [])
 */
class TicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($country_id = null, $state_id = null, $user_id = null)
    {

        if($this->request->getData() != null){
            //debug($this->request->getData());
            
            //$from_date = $this->request->getData()['from_date'];
            //$until_date = $this->request->getData()['until_date'];

            $country_id = $this->request->getData()['country_id'];
            if($country_id == '5') {
                $country_id = $this->getCountriesID();//array(1,2,3,4);
            }
            
            $state_id = $this->request->getData()['state_id'];
            if($state_id == '3'){
                $state_id = $this->getStatesID();//array(1,2);
            }
            $user_id = $this->request->getData()['user_id'];
            if($user_id == '10'){
                $user_id = $this->getUsersID();//array(8,9);
            }

        }
        if($state_id == null){
            $state_id = $this->getStatesID();//array(1,2);
        }
        if($country_id == null){
            $country_id = $this->getCountriesID();//array(1,2,3,4);
        }
        if($user_id == null){
            $user_id = $this->getUsersID();//array(8,9);
        }
        
        //debug($country_id);
        //debug($state_id);
        //debug($user_id);
        
        $tickets = $this->Tickets->find('all', [
            'conditions' => ['country_id in ' => $country_id, 
                             'state_id in ' => $state_id,
                              'user_id in ' => $user_id],
            'contain' => ['Users', 'States', 'Countries']
        ]);            
       
        $this->loadModel('Countries');
        $countries = $this->Countries->find('list');
        $countries = $countries->toArray();
        array_push($countries, "Todos");
        
        $this->loadModel('States');
        $states = $this->States->find('list');
        $states = $states->toArray();
        array_push($states, "Todos");        

        $this->loadModel('Users');
        $users = $this->Users->find('list');
        $users = $users->toArray();
        array_push($users, "Todos");

        if(is_array($state_id)){
            $state_id = $this->getMaxStatesID()+1;
        }
        if(is_array($country_id)){
            $country_id = $this->getMaxCountriesID()+1;
        }
        if(is_array($user_id)){
            $user_id = $this->getMaxUsersID()+1;
        }

        $this->set('tickets', $tickets);
        $this->set('countries', $countries);
        $this->set('states', $states);
        $this->set('users', $users);
        $this->set('country_id', $country_id);
        $this->set('state_id', $state_id);
        $this->set('user_id', $user_id);
    }

    public function getStatesID(){

        $this->loadModel('States');
        $states = $this->States->find('list');
        $states = $states->toArray();
        return array_flip($states);                
    }
    public function getMaxStatesID(){

        $this->loadModel('States');
        $states = $this->States->find('list');
        $states = $states->toArray();
        return max(array_flip($states));
    }
    public function getCountriesID(){
        $this->loadModel('Countries');
        $countries = $this->Countries->find('list');
        $countries = $countries->toArray();
        return array_flip($countries);        
    }
    public function getMaxCountriesID(){
        $this->loadModel('Countries');
        $countries = $this->Countries->find('list');
        $countries = $countries->toArray();
        return max(array_flip($countries));        
    }
    public function getUsersID(){
        $this->loadModel('Users');
        $users = $this->Users->find('list');
        $users = $users->toArray();
        return array_flip($users);        
    }
    public function getMaxUsersID(){
        $this->loadModel('Users');
        $users = $this->Users->find('list');
        $users = $users->toArray();
        return max(array_flip($users));
    }
    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('FizzmodTickets');
        $this->loadModel('VtexTickets');
        $this->loadModel('CauTickets');        
        $cau = null;
        $vtex = null;
        $fizz = null;

        $ticket = $this->Tickets->get($id, [
            'contain' => ['Users', 'States', 'Countries']
        ]);

        
        if($ticket['cau'] != null){
            $cau = $this->CauTickets->get($ticket['cau_ticket_id']);      
            debug($cau['open_date']);      
        }
        if($ticket['vtex'] != null){
            $vtex = $this->VtexTickets->get($ticket['vtex_ticket_id'], [
            'contain' => ['Priorities']
            ]);            
        }
        if($ticket['fizz'] != null){
            $fizz = $this->FizzmodTickets->get($ticket['fizzmod_ticket_id'], [
            'contain' => ['Priorities']
            ]);            
        }

        $this->loadModel('Records');
        $records = $this->Records->find('all', [
            'conditions' => ['ticket_id =' => $ticket['id']],
            'contain' => ['Users']
        ]);
            
        $this->set('ticket', $ticket);
        $this->set('cau', $cau);
        $this->set('vtex', $vtex);
        $this->set('fizz', $fizz);
        $this->set('records', $records);
        $this->set('_serialize', ['ticket']);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            
            $cau = $this->saveTicketCau($this->request->getData());            
            $vtex = $this->saveTicketVtex($this->request->getData());            
            $fizz = $this->saveTicketFizzmod($this->request->getData());
            $ticket['classification_ticket_id'] = $this->saveOrSearchClassification($this->request->getData());      
            
            if($cau != null ){
                $ticket['cau_ticket_id'] = $cau['id'];
                $ticket['cau'] = $cau['cau'];
            }            
            if($vtex != null ){
                $ticket['vtex_ticket_id'] = $vtex['id'];
                $ticket['vtex'] = $vtex['id_vtex'];
            }
            if($fizz != null ){
                $ticket['fizzmod_ticket_id'] = $fizz['id'];
                $ticket['fizz'] = $fizz['id_fizz'];
            }
            $createdTicket = $this->Tickets->save($ticket);
            
            if ($createdTicket) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'view', $createdTicket['id']]);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }

        $this->loadModel('Priorities');
        $priorities_vtex = $this->Priorities->find('list',
            ['conditions' => ['type  LIKE' => 'vtex']]
            );

        
        $priorities_fizzmod = $this->Priorities->find('list',
            ['conditions' => ['type  LIKE' => 'fizzmod']]
            );
        $this->loadModel('ClassificationTickets');

        $query = $this->ClassificationTickets->find('list');

        foreach($query as $value){
            $classifications[$value] = $value;
        }


        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $states = $this->Tickets->States->find('list', ['limit' => 200]);
        $countries = $this->Tickets->Countries->find('list', ['limit' => 200]);
        $cauTickets = $this->Tickets->CauTickets->find('list', ['limit' => 200]);
        $fizzmodTickets = $this->Tickets->FizzmodTickets->find('list', ['limit' => 200]);
        $vtexTickets = $this->Tickets->VtexTickets->find('list', ['limit' => 200]);

        

        $this->set(compact('ticket', 'users', 'states', 'countries', 'cauTickets', 'fizzmodTickets', 'vtexTickets', 'priorities_vtex', 'priorities_fizzmod', 'classifications'));
        $this->set('_serialize', ['ticket']);
    }

    public function saveOrSearchClassification($ticket){
        $this->loadModel('ClassificationTickets');
        
        $classifications = $this->ClassificationTickets->find('all', [
            'conditions' => ['name like' => $ticket['classification']]
        ]);
        //debug($classifications->count());
        //debug($classifications->toArray()[0]['id']);

        if($classifications->count() == 1){//preguntar si existe
            //debug($classifications->toArray()[0]['id']);
            return $classifications->toArray()[0]['id'];
        }
        else{//si no existe, guardar el nuevo dato
            $classificationTicketsTable = TableRegistry::get('ClassificationTickets');
            $class = $classificationTicketsTable->newEntity();
            $class->name = $ticket['classification'];
            return $classificationTicketsTable->save($class)['id'];
        }        
    }
    public function saveTicketFizzmod($ticket){

        $fizzTicketsTable = TableRegistry::get('FizzmodTickets');
        $fizz = $fizzTicketsTable->newEntity();
        if($ticket['fizz'] != null)
            $fizz->id_fizz = $ticket['fizz'];    
        else
            return null;
        
        $fizz->priority_id = $ticket['priority_id_fizz'];
        if($ticket['open_date_fizz'] != null){
            $fizz->open_date = $ticket['open_date_fizz'];
        }
        
        if($ticket['resolution_date_fizz'] != null){
            $fizz->resolution_date = $ticket['resolution_date_fizz'];
        }             
        return $fizzTicketsTable->save($fizz);
    }
    public function saveTicketVtex($ticket){
        $vtexTicketsTable = TableRegistry::get('VtexTickets');
        $vtex = $vtexTicketsTable->newEntity();
        if($ticket['vtex'] != null)
            $vtex->id_vtex = $ticket['vtex'];    
        else
            return null;
        
        $vtex->priority_id = $ticket['priority_id_vtex'];
        if($ticket['open_date_vtex'] != null){
            $vtex->open_date = $ticket['open_date_vtex'];
        }
        
        if($ticket['resolution_date_vtex'] != null){
            $vtex->resolution_date = $ticket['resolution_date_vtex'];
        }             
        return $vtexTicketsTable->save($vtex);            
    }

    public function saveTicketCau($ticket){

        $cauTicketsTable = TableRegistry::get('CauTickets');
        $cau = $cauTicketsTable->newEntity();
        if($ticket['cau'] != null)
            $cau->cau = $ticket['cau'];    
        else
            return null;
        
        $cau->type_ticket_id = $ticket['type_ticket_id'];
        if($ticket['open_date_cau'] != null){
            $cau->open_date = $ticket['open_date_cau'];
        }
        
        if($ticket['resolution_date_cau'] != null){
            $cau->resolution_date = $ticket['resolution_date_cau'];
        }        
        return $cauTicketsTable->save($cau);                
    }
    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
                        
            if($this->request->getData()['cau_ticket_id'] == 0 && $this->request->getData()['cau'] != null){
                $cau = $this->saveTicketCau($this->request->getData());
                $ticket['cau_ticket_id'] = $cau['id'];
                $ticket['cau'] = $cau['cau'];
            }
            if($this->request->getData()['fizzmod_ticket_id'] == 0 && $this->request->getData()['fizz'] != null){
                $fizz = $this->saveTicketFizzmod($this->request->getData());
                $ticket['fizzmod_ticket_id'] = $fizz['id'];
                $ticket['fizz'] = $fizz['id_fizz'];
            }
            if($this->request->getData()['vtex_ticket_id'] == 0 && $this->request->getData()['vtex'] != null){
                $vtex = $this->saveTicketVtex($this->request->getData());                
                $ticket['vtex_ticket_id'] = $vtex['id'];
                $ticket['vtex'] = $vtex['id_vtex'];
            }
            
            $this->updateTicketCau($this->request->getData());
            $this->updateTicketVtex($this->request->getData());
            $this->updateTicketFizzmod($this->request->getData());
            
            $this->saveRecord($this->request->getData());

            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }

        $this->loadModel('FizzmodTickets');
        $this->loadModel('VtexTickets');
        $this->loadModel('CauTickets');
        $cau = null;
        $vtex = null;
        $fizz = null;

        if($ticket['cau'] != null){
            $cau = $this->CauTickets->get($ticket['cau_ticket_id']); 
            if($cau['open_date'] != null){
                $ticket['open_date_cau'] = $cau['open_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }
            
            if($cau['resolution_date'] != null){
                $ticket['resolution_date_cau'] = $cau['resolution_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }            
            $ticket['type_ticket_id'] = $cau['type_ticket_id'];
            
        }
        if($ticket['vtex'] != null){
            $vtex = $this->VtexTickets->get($ticket['vtex_ticket_id']);
            if($vtex['open_date'] != null){
                $ticket['open_date_vtex'] = $vtex['open_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }
            if($vtex['resolution_date'] != null){
                $ticket['resolution_date_vtex'] = $vtex['resolution_date']->i18nFormat('yyyy-MM-dd HH:mm');    
            }                        
            $ticket['priority_id_vtex'] = $vtex['priority_id'];            
        }
        if($ticket['fizz'] != null){
            $fizz = $this->FizzmodTickets->get($ticket['fizzmod_ticket_id']);
            if($fizz['open_date'] != null){
                $ticket['open_date_fizz'] = $fizz['open_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }
            if($fizz['resolution_date'] != null){
                $ticket['resolution_date_fizz'] = $fizz['resolution_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }                        
            $ticket['priority_id_fizz'] = $fizz['priority_id'];      
        }


        $users = $this->Tickets->Users->find('list', ['limit' => 200]);
        $states = $this->Tickets->States->find('list', ['limit' => 200]);
        $countries = $this->Tickets->Countries->find('list', ['limit' => 200]);    

        $this->loadModel('Priorities');
        $priorities_vtex = $this->Priorities->find('list',
            ['conditions' => ['type  LIKE' => 'vtex']]
            );

        
        $priorities_fizzmod = $this->Priorities->find('list',
            ['conditions' => ['type  LIKE' => 'fizzmod']]
            );    

        $this->set(compact('ticket', 'users', 'states', 'countries', 'priorities_vtex', 'priorities_fizzmod'));
        $this->set('_serialize', ['ticket']);
    }

    public function saveRecord($ticket){        
        
        $recordsTable = TableRegistry::get('Records');
        $record = $recordsTable->newEntity();
        if($ticket['record_description'] != null)
            $record->description = $ticket['record_description'];    
        else
            return null;
        $record->ticket_id = $ticket['ticket_id'];        
        $record->user_id = $ticket['record_user_id'];
        if($record->date = $ticket['record_date'] == null){
            $time = new time();
            $time->setTimezone(new \DateTimeZone('America/Santiago'));
            $record->date = $time;            
        }
        else{
            $record->date = $ticket['record_date'];
        }
        
             
        return $recordsTable->save($record);               

    }
    public function updateTicketFizzmod($ticket){
        if($ticket['fizzmod_ticket_id'] != 0){
            $fizzTicketsTable = TableRegistry::get('FizzmodTickets');
            $fizz = $fizzTicketsTable->get($ticket['fizzmod_ticket_id']);

            $fizz->priority_id = $ticket['priority_id_fizz'];
            if($ticket['open_date_fizz'] != null){
                $fizz->open_date = $ticket['open_date_fizz'];
            }
            
            if($ticket['resolution_date_fizz'] != null){
                $fizz->resolution_date = $ticket['resolution_date_fizz'];
            }             
            return $fizzTicketsTable->save($fizz);            
        }
        return null;
        
    }
    public function updateTicketVtex($ticket){
        if($ticket['vtex_ticket_id'] != 0){
            $vtexTicketsTable = TableRegistry::get('VtexTickets');
            $vtex = $vtexTicketsTable->get($ticket['vtex_ticket_id']);
            
            $vtex->priority_id = $ticket['priority_id_vtex'];
            if($ticket['open_date_vtex'] != null){
                $vtex->open_date = $ticket['open_date_vtex'];
            }
            
            if($ticket['resolution_date_vtex'] != null){
                $vtex->resolution_date = $ticket['resolution_date_vtex'];
            }             
            return $vtexTicketsTable->save($vtex);  
        }
        return null;
                  
    }

    public function updateTicketCau($ticket){
        if($ticket['cau_ticket_id'] != 0){
            $cauTicketsTable = TableRegistry::get('CauTickets');
            $cau = $cauTicketsTable->get($ticket['cau_ticket_id']);

            $cau->type_ticket_id = $ticket['type_ticket_id'];
            if($ticket['open_date_cau'] != null){
                $cau->open_date = $ticket['open_date_cau'];
            }
            
            if($ticket['resolution_date_cau'] != null){
                $cau->resolution_date = $ticket['resolution_date_cau'];
            }        
            return $cauTicketsTable->save($cau); 
        }        
        return null;
    }
    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
