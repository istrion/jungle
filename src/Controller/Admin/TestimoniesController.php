<?php
namespace App\Controller\admin;

use App\Controller\Admin\AppAdminController;
use Cake\Event\Event;

/**
 * Testimonies Controller
 *
 * @property \App\Model\Table\TestimoniesTable $Testimonies
 */
class TestimoniesController extends AppAdminController
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
        $this->paginate = [];
        $testimonies = $this->paginate($this->Testimonies);

        $this->set(compact('testimonies'));
        $this->set('_serialize', ['testimonies']);
    }

    /**
     * View method
     *
     * @param string|null $id Town id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testimony = $this->Testimonies->get($id);

        $this->set('testimony', $testimony);
        $this->set('_serialize', ['testimony']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimony = $this->Testimonies->newEntity();
        if ($this->request->is('post')) {
            $testimony = $this->Testimonies->patchEntity($testimony, $this->request->data);
            if ($this->Testimonies->save($testimony)) {
                $this->Flash->success(__('Le témoignage a bien été sauvegardé'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimony could not be saved. Please, try again.'));
            }
        }
        $this->set('testimony', $testimony);
        $this->set('_serialize', ['testimony']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Town id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testimony = $this->Testimonies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testimony = $this->Testimonies->patchEntity($testimony, $this->request->data);
            if ($this->Testimonies->save($testimony)) {
                $this->Flash->success(__('Le témoignage a bien été sauvegardé'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The testimony could not be saved. Please, try again.'));
            }
        }
        $this->set('testimony', $testimony);
        $this->set('_serialize', ['testimony']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Town id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testimony = $this->Testimonies->get($id);
        if ($this->Testimonies->delete($testimony)) {
            $this->Flash->success(__('Le témoignage a bien été supprimé'));
        } else {
            $this->Flash->error(__('The town could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
