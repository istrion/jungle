<?php
namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Dpes Controller
 *
 * @property \App\Model\Table\DpesTable $Dpes
 */
class DpesController extends AppAdminController
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
        $dpes = $this->paginate($this->Dpes);

        $this->set(compact('dpes'));
        $this->set('_serialize', ['dpes']);
    }

    /**
     * View method
     *
     * @param string|null $id Dpe id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dpe = $this->Dpes->get($id, [
            'contain' => ['Biens']
        ]);

        $this->set('dpe', $dpe);
        $this->set('_serialize', ['dpe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dpe = $this->Dpes->newEntity();
        if ($this->request->is('post')) {
            $dpe = $this->Dpes->patchEntity($dpe, $this->request->data);
            if ($this->Dpes->save($dpe)) {
                $this->Flash->success(__('The dpe has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dpe could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dpe'));
        $this->set('_serialize', ['dpe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dpe id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dpe = $this->Dpes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dpe = $this->Dpes->patchEntity($dpe, $this->request->data);
            if ($this->Dpes->save($dpe)) {
                $this->Flash->success(__('The dpe has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dpe could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dpe'));
        $this->set('_serialize', ['dpe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dpe id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dpe = $this->Dpes->get($id);
        if ($this->Dpes->delete($dpe)) {
            $this->Flash->success(__('The dpe has been deleted.'));
        } else {
            $this->Flash->error(__('The dpe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
