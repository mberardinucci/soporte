<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VtexTickets Controller
 *
 * @property \App\Model\Table\VtexTicketsTable $VtexTickets
 *
 * @method \App\Model\Entity\VtexTicket[] paginate($object = null, array $settings = [])
 */
class VtexTicketsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Priorities']
        ];
        $vtexTickets = $this->paginate($this->VtexTickets);

        $this->set(compact('vtexTickets'));
        $this->set('_serialize', ['vtexTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Vtex Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vtexTicket = $this->VtexTickets->get($id, [
            'contain' => ['Priorities', 'Tickets']
        ]);

        $this->set('vtexTicket', $vtexTicket);
        $this->set('_serialize', ['vtexTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vtexTicket = $this->VtexTickets->newEntity();
        if ($this->request->is('post')) {
            $vtexTicket = $this->VtexTickets->patchEntity($vtexTicket, $this->request->getData());
            if ($this->VtexTickets->save($vtexTicket)) {
                $this->Flash->success(__('The vtex ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vtex ticket could not be saved. Please, try again.'));
        }
        $priorities = $this->VtexTickets->Priorities->find('list', ['limit' => 200]);
        $this->set(compact('vtexTicket', 'priorities'));
        $this->set('_serialize', ['vtexTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vtex Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vtexTicket = $this->VtexTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vtexTicket = $this->VtexTickets->patchEntity($vtexTicket, $this->request->getData());
            if ($this->VtexTickets->save($vtexTicket)) {
                $this->Flash->success(__('The vtex ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vtex ticket could not be saved. Please, try again.'));
        }
        $priorities = $this->VtexTickets->Priorities->find('list', ['limit' => 200]);
        $this->set(compact('vtexTicket', 'priorities'));
        $this->set('_serialize', ['vtexTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vtex Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vtexTicket = $this->VtexTickets->get($id);
        if ($this->VtexTickets->delete($vtexTicket)) {
            $this->Flash->success(__('The vtex ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The vtex ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
