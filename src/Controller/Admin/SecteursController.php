<?php
namespace App\Controller\admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Secteurs Controller
 *
 * @property \App\Model\Table\SecteursTable $Secteurs
 */
class SecteursController extends AppAdminController
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
        $secteurs = $this->paginate($this->Secteurs);

        $this->set(compact('secteurs'));
        $this->set('_serialize', ['secteurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $secteur = $this->Secteurs->get($id, [
            'contain' => ['Biens', 'Towns']
        ]);

        $this->set('secteur', $secteur);
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $secteur = $this->Secteurs->newEntity();
        if ($this->request->is('post')) {
            $secteur = $this->Secteurs->patchEntity($secteur, $this->request->data);
            if ($this->Secteurs->save($secteur)) {
                $this->Flash->success(__('The secteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The secteur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('secteur'));
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $secteur = $this->Secteurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $secteur = $this->Secteurs->patchEntity($secteur, $this->request->data);
            if ($this->Secteurs->save($secteur)) {
                $this->Flash->success(__('The secteur has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The secteur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('secteur'));
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $secteur = $this->Secteurs->get($id);
        if ($this->Secteurs->delete($secteur)) {
            $this->Flash->success(__('The secteur has been deleted.'));
        } else {
            $this->Flash->error(__('The secteur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
