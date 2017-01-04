<?php
namespace App\Controller\admin;

use App\Controller\Admin\AppAdminController;
use Cake\Event\Event;

/**
 * Exclusivities Controller
 *
 * @property \App\Model\Table\ExclusivitiesTable $Exclusivities
 */
class ExclusivitiesController extends AppAdminController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        if($this->request->params['action'] == 'exportExclu'){
            $this->viewBuilder()->layout(false);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $exclusivities = $this->paginate($this->Exclusivities);

        $this->set(compact('exclusivities'));
        $this->set('_serialize', ['exclusivities']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exclusivity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exclusivity = $this->Exclusivities->get($id);
        if ($this->Exclusivities->delete($exclusivity)) {
            $this->Flash->success(__('The exclusivity has been deleted.'));
        } else {
            $this->Flash->error(__('The exclusivity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function exportExclu() {
        $this->viewBuilder()->layout(false);
        $data = $this->Exclusivities->find('all');
        $this->set(compact('data'));
        $this->response->download("export.csv");
        return;
    }
}
