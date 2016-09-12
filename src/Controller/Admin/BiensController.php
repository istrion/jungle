<?php
namespace App\Controller\admin;

use App\Controller\Admin\AppAdminController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


/**
 * Biens Controller
 *
 * @property \App\Model\Table\BiensTable $Biens
 */
class BiensController extends AppAdminController
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
            'contain' => ['Secteurs', 'Dpes']
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
    public function view($slug = null)
    {
        if (!$slug) {
            $this->Session->setFlash('Invalid id for Post.');
            $this->redirect('/biens/');
        }

        //debug($this->Biens->findBySlug($slug));die();
        $bien = $this->Biens->findBySlug($slug);
        $this->set('bien', $bien->first());

        $this->set('_serialize', ['bien']);
    }
    /*public function view($id = null)
    {
        $bien = $this->Biens->get($id, [
            'contain' => ['Secteurs', 'Dpes']
        ]);

        $this->set('bien', $bien);
        $this->set('_serialize', ['bien']);
    }*/

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('scriptDropzone', '<script type="text/javascript" src="'.PATH_ADMIN.'/admin/js/dropzone.js" ></script>');
        $this->set('activateDropzone', '<script>$(function() {
                                                Dropzone.autoDiscover = false;
                                                var myDropzone = new Dropzone("#uploadImages", { url: "/admin/biens/addImage" , paramName : "image"});
                                                    myDropzone.on("success", function(data){
                                                        var response =  JSON.parse(data.xhr.response);
                                                        $("#list-img").append("<li><img src=\"" +response.image+ "\"/><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\" id=\"imgId_"+response.id+"\"></span></li>");
                                                        var value = $("#list_image_id").val(),
                                                            finalValue = (value == "") ? response.id: value +","+response.id;
                                                        $("#list_image_id").val(finalValue);

                                                    });
                                                })</script>');

        $bien = $this->Biens->newEntity();
        if ($this->request->is('post')) {
            $slug = $this->_stringToSlug($this->request->data['title']);
            $this->request->data['slug'] = $slug;
            $bien = $this->Biens->patchEntity($bien, $this->request->data);
            $resultSave = $this->Biens->save($bien);
            if ($resultSave) {
                return $this->_saveImagesBiens($resultSave->id, $this->request->data['list_image_id']);
            } else {
                $this->Flash->error(__('The bien could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Biens->Secteurs->find('list', ['limit' => 200]);
        $towns = $this->Biens->Towns->find('all', ['limit' => 200]);
        $townSelect = array();
        foreach ($towns as $town) {
            $townSelect[$town->id] = $town->title;
        }

        $dpes = $this->Biens->Dpes->find('list', ['limit' => 200]);

        $agents = $this->Biens->Agents->find('all', ['limit' => 200]);
        $agentSelect = array();
        foreach ($agents as $agent) {
            $agentSelect[$agent->id] = $agent->first_name . ' ' . $agent->last_name;
        }

        $this->set(compact('bien', 'secteurs', 'townSelect', 'dpes', 'agentSelect'));
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
        $this->set('scriptDropzone', '<script type="text/javascript" src="'.PATH_ADMIN.'/admin/js/dropzone.js" ></script>');
        $this->set('activateDropzone', '<script>$(function() {
                                                Dropzone.autoDiscover = false;
                                                var myDropzone = new Dropzone("#uploadImages", { url: "/admin/biens/addImage" , paramName : "image"});
                                                    myDropzone.on("success", function(data){
                                                        var response =  JSON.parse(data.xhr.response);
                                                        $("#list-img").append("<li><img src=\"" +response.image+ "\"/><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\" id=\"imgId_"+response.id+"\"></span></li>");
                                                        var value = $("#list_image_id").val(),
                                                            finalValue = (value == "") ? response.id: value +","+response.id;
                                                        $("#list_image_id").val(finalValue);

                                                    });
                                                })</script>');

        $bien = $this->Biens->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slug = $this->_stringToSlug($this->request->data['title']);
            $this->request->data['slug'] = $slug;
            $bien = $this->Biens->patchEntity($bien, $this->request->data);
            if ($this->Biens->save($bien)) {
                $this->Flash->success(__('The bien has been saved.'));
            } else {
                $this->Flash->error(__('The bien could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Biens->Secteurs->find('list', ['limit' => 200]);
        $towns = $this->Biens->Towns->find('all', ['limit' => 200]);
        $townSelect = array();
        foreach ($towns as $town) {
            $townSelect[$town->id] = $town->title;
        }
        $dpes = $this->Biens->Dpes->find('list', ['limit' => 200]);
        $agents = $this->Biens->Agents->find('all', ['limit' => 200]);
        $agentSelect = array();
        foreach ($agents as $agent) {
            $agentSelect[$agent->id] = $agent->first_name . ' ' . $agent->last_name;
        }

        $this->set(compact('bien', 'secteurs', 'townSelect', 'dpes', 'agentSelect'));
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

    public function addImage()
    {
        $this->viewBuilder()->layout('');

        $imagesTable = TableRegistry::get('Images');
        $image = $imagesTable->newEntity();
        $fileName = $this->request->data['image']["name"];
        $tmpName = $this->request->data['image']['tmp_name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        $fileNameFinal = $fileName . '_' . $s . '.' . $ext;
        $uploadDir = WWW_ROOT . 'img/biens/' . $fileNameFinal;


        if ($this->request->is('post')) {

            move_uploaded_file($tmpName, $uploadDir);

            $image->name = $fileNameFinal;
            $image->path = WWW_ROOT . 'img/biens/';

            if ($imagesTable->save($image)) {
                $this->response->body('{"id":"' . $image->id . '","image":"/img/biens/' . $fileNameFinal . '"}');
                return $this->response;
            }
        }
    }

    private function _saveImagesBiens($bien_id, $images)
    {
        $listImage = explode(",", $images);
        $data = array();

        foreach ($listImage as $imageId) {
            $data[] = [
                'bien_id' => $bien_id,
                'image_id' => $imageId
            ];
        }
        $ImagesBiensTable = TableRegistry::get('ImagesBiens');
        $entities = $ImagesBiensTable->newEntities($data);
        $result = $ImagesBiensTable->saveMany($entities);

        $this->Flash->success(__('The bien has been saved.'));

        return $this->redirect(['action' => 'index']);
    }

    private function _stringToSlug($str) {
        // trim the string
        $str = strtolower(trim($str));
        // replace all non valid characters and spaces with an underscore
        $str = preg_replace('/[^a-z0-9-]/', '_', $str);
        $str = preg_replace('/-+/', "_", $str);
        return $str;
    }
}
