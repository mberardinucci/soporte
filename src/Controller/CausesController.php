<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Causes Controller
 *
 * @property \App\Model\Table\CausesTable $Causes
 *
 * @method \App\Model\Entity\Cause[] paginate($object = null, array $settings = [])
 */
class CausesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $causes = $this->paginate($this->Causes);

        $this->set(compact('causes'));
        $this->set('_serialize', ['causes']);
    }

    /**
     * View method
     *
     * @param string|null $id Cause id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cause = $this->Causes->get($id, [
            'contain' => ['JumboclTickets']
        ]);

        $this->set('cause', $cause);
        $this->set('_serialize', ['cause']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cause = $this->Causes->newEntity();
        if ($this->request->is('post')) {
            $cause = $this->Causes->patchEntity($cause, $this->request->getData());
            if ($this->Causes->save($cause)) {
                $this->Flash->success(__('The cause has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cause could not be saved. Please, try again.'));
        }
        $this->set(compact('cause'));
        $this->set('_serialize', ['cause']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cause id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cause = $this->Causes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cause = $this->Causes->patchEntity($cause, $this->request->getData());
            if ($this->Causes->save($cause)) {
                $this->Flash->success(__('The cause has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cause could not be saved. Please, try again.'));
        }
        $this->set(compact('cause'));
        $this->set('_serialize', ['cause']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cause id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cause = $this->Causes->get($id);
        if ($this->Causes->delete($cause)) {
            $this->Flash->success(__('The cause has been deleted.'));
        } else {
            $this->Flash->error(__('The cause could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
