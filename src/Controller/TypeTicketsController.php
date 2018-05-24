<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypeTickets Controller
 *
 * @property \App\Model\Table\TypeTicketsTable $TypeTickets
 *
 * @method \App\Model\Entity\TypeTicket[] paginate($object = null, array $settings = [])
 */
class TypeTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typeTickets = $this->paginate($this->TypeTickets);

        $this->set(compact('typeTickets'));
        $this->set('_serialize', ['typeTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Type Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeTicket = $this->TypeTickets->get($id, [
            'contain' => ['CauTickets']
        ]);

        $this->set('typeTicket', $typeTicket);
        $this->set('_serialize', ['typeTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeTicket = $this->TypeTickets->newEntity();
        if ($this->request->is('post')) {
            $typeTicket = $this->TypeTickets->patchEntity($typeTicket, $this->request->getData());
            if ($this->TypeTickets->save($typeTicket)) {
                $this->Flash->success(__('The type ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type ticket could not be saved. Please, try again.'));
        }
        $this->set(compact('typeTicket'));
        $this->set('_serialize', ['typeTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Type Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeTicket = $this->TypeTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeTicket = $this->TypeTickets->patchEntity($typeTicket, $this->request->getData());
            if ($this->TypeTickets->save($typeTicket)) {
                $this->Flash->success(__('The type ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The type ticket could not be saved. Please, try again.'));
        }
        $this->set(compact('typeTicket'));
        $this->set('_serialize', ['typeTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Type Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeTicket = $this->TypeTickets->get($id);
        if ($this->TypeTickets->delete($typeTicket)) {
            $this->Flash->success(__('The type ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The type ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
