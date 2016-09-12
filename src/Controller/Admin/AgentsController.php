<?php
namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Agents Controller
 *
 * @property \App\Model\Table\AgentsTable $Agents
 */
class AgentsController extends AppAdminController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $agents = $this->paginate($this->Agents);

        $this->set(compact('agents'));
        $this->set('_serialize', ['agents']);
    }

    /**
     * View method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agent = $this->Agents->get($id, [
            'contain' => ['Biens']
        ]);

        $this->set('agent', $agent);
        $this->set('_serialize', ['agent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agent = $this->Agents->newEntity();
        if ($this->request->is('post')) {
            $agent = $this->Agents->patchEntity($agent, $this->request->data);
            if ($this->Agents->save($agent)) {
                $this->Flash->success(__('The agent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The agent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('agent'));
        $this->set('_serialize', ['agent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agent = $this->Agents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agent = $this->Agents->patchEntity($agent, $this->request->data);
            if ($this->Agents->save($agent)) {
                $this->Flash->success(__('The agent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The agent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('agent'));
        $this->set('_serialize', ['agent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agent = $this->Agents->get($id);
        if ($this->Agents->delete($agent)) {
            $this->Flash->success(__('The agent has been deleted.'));
        } else {
            $this->Flash->error(__('The agent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
