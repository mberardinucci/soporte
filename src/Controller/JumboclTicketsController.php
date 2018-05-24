<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * JumboclTickets Controller
 *
 * @property \App\Model\Table\JumboclTicketsTable $JumboclTickets
 *
 * @method \App\Model\Entity\JumboclTicket[] paginate($object = null, array $settings = [])
 */
class JumboclTicketsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $jumboclTickets = $this->JumboclTickets->find('all', [            
            'contain' => ['Causes', 'Users', 'CauTickets']
            ]);
            
        /**foreach ($jumboclTickets as $value) {
            $value['cau_ticket']['open_date'] = $value['cau_ticket']['open_date']->i18nFormat('dd-MM-yyyy HH:mm');
            $value['cau_ticket']['resolution_date'] = $value['cau_ticket']['resolution_date']->i18nFormat('dd-MM-yyyy HH:mm');            
        }**/
        $this->set('jumboclTickets', $jumboclTickets);
        
    }
    /**
     * View method
     *
     * @param string|null $id Jumbocl Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jumboclTicket = $this->JumboclTickets->get($id, [
            'contain' => ['Causes', 'Users', 'CauTickets']
        ]);
        $this->set('jumboclTicket', $jumboclTicket);
        $this->set('_serialize', ['jumboclTicket']);
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jumboclTicket = $this->JumboclTickets->newEntity();
        if ($this->request->is('post')) {
            $jumboclTicket = $this->JumboclTickets->patchEntity($jumboclTicket, $this->request->getData());
            //debug($this->request->getData());exit;
            //debo guardar el cau
            $cauTicketsTable = TableRegistry::get('CauTickets');
            $cau = $cauTicketsTable->newEntity();
            $cau->cau = $this->request->getData()['cau'];
            $cau->type_ticket_id = $this->request->getData()['type_ticket_id'];
            if($this->request->getData()['open_date'] != null){
                $cau->open_date = $this->request->getData()['open_date'];
            }
            
            if($this->request->getData()['resolution_date'] != null){
                $cau->resolution_date = $this->request->getData()['resolution_date'];
            }
            $cau = $cauTicketsTable->save($cau);        
            $jumboclTicket['cau_ticket_id'] = $cau['id'];
            if ($this->JumboclTickets->save($jumboclTicket)) {
                $this->Flash->success(__('The jumbocl ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jumbocl ticket could not be saved. Please, try again.'));
        }
        $causes = $this->JumboclTickets->Causes->find('list', ['limit' => 200]);
        $users = $this->JumboclTickets->Users->find('list', ['limit' => 200]);
        
        $this->set(compact('jumboclTicket', 'causes', 'users'));
        $this->set('_serialize', ['jumboclTicket']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Jumbocl Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jumboclTicket = $this->JumboclTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jumboclTicket = $this->JumboclTickets->patchEntity($jumboclTicket, $this->request->getData());

            $cauTicketsTable = TableRegistry::get('CauTickets');
            $cau = $cauTicketsTable->get($jumboclTicket['cau_ticket_id']);
            $cau->cau = $this->request->getData()['cau'];
            $cau->type_ticket_id = $this->request->getData()['type_ticket_id'];
            if($this->request->getData()['open_date_cau'] != null){
                $cau->open_date = $this->request->getData()['open_date_cau'];
            }
            
            if($this->request->getData()['resolution_date_cau'] != null){
                $cau->resolution_date = $this->request->getData()['resolution_date_cau'];
            }
            $cau = $cauTicketsTable->save($cau);  

            if ($this->JumboclTickets->save($jumboclTicket)) {
                $this->Flash->success(__('The jumbocl ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The jumbocl ticket could not be saved. Please, try again.'));
        }

        $this->loadModel('CauTickets');
        
        $cau = null;

        if($jumboclTicket['cau'] != null){
            $cau = $this->CauTickets->get($jumboclTicket['cau_ticket_id']); 
            if($cau['open_date'] != null){
                $jumboclTicket['open_date_cau'] = $cau['open_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }
            
            if($cau['resolution_date'] != null){
                $jumboclTicket['resolution_date_cau'] = $cau['resolution_date']->i18nFormat('yyyy-MM-dd HH:mm');
            }            
            $jumboclTicket['type_ticket_id'] = $cau['type_ticket_id'];
            
        }

        $causes = $this->JumboclTickets->Causes->find('list', ['limit' => 200]);
        $users = $this->JumboclTickets->Users->find('list', ['limit' => 200]);        
        $this->set(compact('jumboclTicket', 'causes', 'users'));
        $this->set('_serialize', ['jumboclTicket']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Jumbocl Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jumboclTicket = $this->JumboclTickets->get($id);
        if ($this->JumboclTickets->delete($jumboclTicket)) {
            $this->Flash->success(__('The jumbocl ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The jumbocl ticket could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}