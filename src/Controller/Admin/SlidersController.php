<?php
namespace App\Controller\admin;

use App\Controller\Admin\AppAdminController;

/**
 * Sliders Controller
 *
 * @property \App\Model\Table\SlidersTable $Sliders
 */
class SlidersController extends AppAdminController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sliders = $this->paginate($this->Sliders);

        $this->set(compact('sliders'));
        $this->set('_serialize', ['sliders']);
    }

    /**
     * View method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);

        $this->set('slider', $slider);
        $this->set('_serialize', ['slider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slider = $this->Sliders->newEntity();
        $this->_saveSlider($slider);
    }

    /**
     * Edit method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slider = $this->Sliders->get($id, [
            'contain' => []
        ]);
        $this->_saveSlider($slider);
    }

    private function _saveSlider($slider){

        if ($this->request->is(['patch', 'post', 'put'])) {
            $fileName = $this->request->data['path']["name"];
            $tmpName = $this->request->data['path']['tmp_name'];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = pathinfo($fileName, PATHINFO_FILENAME);
            $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
            $fileNameFinal = $fileName . '_' . $s . '.' . $ext;
            $uploadDir = WWW_ROOT . 'img/slider/' . $fileNameFinal;

            move_uploaded_file($tmpName, $uploadDir);

            $slider->path = '/img/slider/'.$fileNameFinal;

            if ($this->Sliders->save($slider)) {
                $this->Flash->success(__('The slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The slider could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('slider'));
        $this->set('_serialize', ['slider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Slider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slider = $this->Sliders->get($id);
        if ($this->Sliders->delete($slider)) {
            $this->Flash->success(__('The slider has been deleted.'));
        } else {
            $this->Flash->error(__('The slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
