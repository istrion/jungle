<?php
namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Biens Controller
 *
 * @property \App\Model\Table\BiensTable $Biens
 */
class BiensController extends AppController
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
        $this->paginate = [
            'contain' => ['Secteurs', 'Towns', 'Dpes', 'Agents']
        ];
        $biens = $this->paginate($this->Biens);

        $this->set(compact('biens'));
        $this->set('_serialize', ['biens']);
    }

    /**
     * View method
     *
     * @param string|null $id Bien id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bien = $this->Biens->get($id, [
            'contain' => ['Secteurs', 'Towns', 'Dpes', 'Agents']
        ]);

        $this->set('bien', $bien);
        $this->set('_serialize', ['bien']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bien = $this->Biens->newEntity();
        if ($this->request->is('post')) {
            $bien = $this->Biens->patchEntity($bien, $this->request->data);
            if ($this->Biens->save($bien)) {
                $this->Flash->success(__('The bien has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bien could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Biens->Secteurs->find('list', ['limit' => 200]);
        $towns = $this->Biens->Towns->find('list', ['limit' => 200]);
        $dpes = $this->Biens->Dpes->find('list', ['limit' => 200]);
        $agents = $this->Biens->Agents->find('list', ['limit' => 200]);
        $this->set(compact('bien', 'secteurs', 'towns', 'dpes', 'agents'));
        $this->set('_serialize', ['bien']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bien id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bien = $this->Biens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bien = $this->Biens->patchEntity($bien, $this->request->data);
            if ($this->Biens->save($bien)) {
                $this->Flash->success(__('The bien has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bien could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Biens->Secteurs->find('list', ['limit' => 200]);
        $towns = $this->Biens->Towns->find('list', ['limit' => 200]);
        $dpes = $this->Biens->Dpes->find('list', ['limit' => 200]);
        $agents = $this->Biens->Agents->find('list', ['limit' => 200]);
        $this->set(compact('bien', 'secteurs', 'towns', 'dpes', 'agents'));
        $this->set('_serialize', ['bien']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bien id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bien = $this->Biens->get($id);
        if ($this->Biens->delete($bien)) {
            $this->Flash->success(__('The bien has been deleted.'));
        } else {
            $this->Flash->error(__('The bien could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
