<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CauTickets Controller
 *
 * @property \App\Model\Table\CauTicketsTable $CauTickets
 *
 * @method \App\Model\Entity\CauTicket[] paginate($object = null, array $settings = [])
 */
class CauTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeTickets']
        ];
        $cauTickets = $this->paginate($this->CauTickets);

        $this->set(compact('cauTickets'));
        $this->set('_serialize', ['cauTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Cau Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cauTicket = $this->CauTickets->get($id, [
            'contain' => ['TypeTickets', 'JumboclTickets']
        ]);

        $this->set('cauTicket', $cauTicket);
        $this->set('_serialize', ['cauTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cauTicket = $this->CauTickets->newEntity();
        if ($this->request->is('post')) {
            $cauTicket = $this->CauTickets->patchEntity($cauTicket, $this->request->getData());
            if ($this->CauTickets->save($cauTicket)) {
                $this->Flash->success(__('The cau ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cau ticket could not be saved. Please, try again.'));
        }
        $typeTickets = $this->CauTickets->TypeTickets->find('list', ['limit' => 200]);
        $this->set(compact('cauTicket', 'typeTickets'));
        $this->set('_serialize', ['cauTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cau Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cauTicket = $this->CauTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cauTicket = $this->CauTickets->patchEntity($cauTicket, $this->request->getData());
            if ($this->CauTickets->save($cauTicket)) {
                $this->Flash->success(__('The cau ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cau ticket could not be saved. Please, try again.'));
        }
        $typeTickets = $this->CauTickets->TypeTickets->find('list', ['limit' => 200]);
        $this->set(compact('cauTicket', 'typeTickets'));
        $this->set('_serialize', ['cauTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cau Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cauTicket = $this->CauTickets->get($id);
        if ($this->CauTickets->delete($cauTicket)) {
            $this->Flash->success(__('The cau ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The cau ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
