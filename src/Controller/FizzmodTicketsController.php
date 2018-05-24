<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FizzmodTickets Controller
 *
 * @property \App\Model\Table\FizzmodTicketsTable $FizzmodTickets
 *
 * @method \App\Model\Entity\FizzmodTicket[] paginate($object = null, array $settings = [])
 */
class FizzmodTicketsController extends AppController
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
        $fizzmodTickets = $this->paginate($this->FizzmodTickets);

        $this->set(compact('fizzmodTickets'));
        $this->set('_serialize', ['fizzmodTickets']);
    }

    /**
     * View method
     *
     * @param string|null $id Fizzmod Ticket id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fizzmodTicket = $this->FizzmodTickets->get($id, [
            'contain' => ['Priorities', 'Tickets']
        ]);

        $this->set('fizzmodTicket', $fizzmodTicket);
        $this->set('_serialize', ['fizzmodTicket']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fizzmodTicket = $this->FizzmodTickets->newEntity();
        if ($this->request->is('post')) {
            $fizzmodTicket = $this->FizzmodTickets->patchEntity($fizzmodTicket, $this->request->getData());
            if ($this->FizzmodTickets->save($fizzmodTicket)) {
                $this->Flash->success(__('The fizzmod ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fizzmod ticket could not be saved. Please, try again.'));
        }
        $priorities = $this->FizzmodTickets->Priorities->find('list', ['limit' => 200]);
        $this->set(compact('fizzmodTicket', 'priorities'));
        $this->set('_serialize', ['fizzmodTicket']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fizzmod Ticket id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fizzmodTicket = $this->FizzmodTickets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fizzmodTicket = $this->FizzmodTickets->patchEntity($fizzmodTicket, $this->request->getData());
            if ($this->FizzmodTickets->save($fizzmodTicket)) {
                $this->Flash->success(__('The fizzmod ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fizzmod ticket could not be saved. Please, try again.'));
        }
        $priorities = $this->FizzmodTickets->Priorities->find('list', ['limit' => 200]);
        $this->set(compact('fizzmodTicket', 'priorities'));
        $this->set('_serialize', ['fizzmodTicket']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fizzmod Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fizzmodTicket = $this->FizzmodTickets->get($id);
        if ($this->FizzmodTickets->delete($fizzmodTicket)) {
            $this->Flash->success(__('The fizzmod ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The fizzmod ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
