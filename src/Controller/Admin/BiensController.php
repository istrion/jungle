<?php
namespace App\Controller\admin;

use App\Controller\Admin\AppAdminController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;


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

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //nouveau bien
        $bien = $this->Biens->newEntity();

        $this->_saveBien($bien);
        $this->_loadAssetsBien($bien);
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
        //Chargement ou nouveau bien
        if ($id) {
            $bien = $this->Biens->get($id, [
                'contain' => ['Images' => ['sort' => ['Images.sort_order' => 'ASC']]]
            ]);

        } else {
            $bien = $this->Biens->newEntity();
        }

        $this->_saveBien($bien);
        $this->_loadAssetsBien($bien);

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

        return $this->redirect('/admin/biens/index/');
    }

    private function _saveBien($bien)
    {
        //Préparation du slug pour l'url
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->params['action'] != "edit") {
                $slug = $this->_stringToSlug($this->request->data['title']);
                $this->request->data['slug'] = $slug;
            }

            $bien = $this->Biens->patchEntity($bien, $this->request->data);

            //Sauvegarde du bien
            if ($this->Biens->save($bien)) {
                //Sauvegarde des images associées
                return $this->_saveImagesBiens($bien->id, $this->request->data['list_image_id']);
            } else {
                $this->Flash->error(__('The bien could not be saved. Please, try again.'));
            }
        }

    }

    private function _loadAssetsBien($bien)
    {

        //Chargement des listes ( secteur, villes, dpe, agents ... )

        $secteurs = $this->Biens->Secteurs->find('list', ['limit' => 200]);
        $towns = $this->Biens->Towns->find('all', ['limit' => 200]);
        $townSelect = array();
        foreach ($towns as $town) {
            $townSelect[$town->id] = $town->title;
        }
        $dpes = $this->Biens->Dpes->find('list', ['limit' => 200,]);
        $agents = $this->Biens->Agents->find('all', ['limit' => 200]);
        $agentSelect = array();
        foreach ($agents as $agent) {
            $agentSelect[$agent->id] = $agent->first_name . ' ' . $agent->last_name;
        }

        //Si le bien existe déja on va charger les images associées
        if ($bien->id) {
            $ImagesBiensTable = TableRegistry::get('ImagesBiens');

            $imagesBiens = $ImagesBiensTable->find('all',
                [
                    'limit' => 200,
                    'fields' => ['id', 'Images.name', 'Images.path'],
                    'conditions' => ['ImagesBiens.bien_id ' => $bien->id]
                ])
                ->innerJoinWith('Images');
        }

        $this->set(compact('bien', 'secteurs', 'townSelect', 'dpes', 'agentSelect', 'imagesBiens'));
        $this->set('_serialize', ['bien']);
    }

    public function addImage()
    {
        $this->viewBuilder()->layout('');
        $this->render(false);

        $imagesTable = TableRegistry::get('Images');
        $image = $imagesTable->newEntity();

        $fileName = $this->request->data['image']["name"];
        $tmpName = $this->request->data['image']['tmp_name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileName = pathinfo($fileName, PATHINFO_FILENAME);
        $s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
        $fileNameFinal = $this->_renameImage($fileName) . '_' . $s . '.' . $ext;
        $uploadDir = WWW_ROOT . 'img/biens/' . $fileNameFinal;

        if ($this->request->is('post')) {
            $this->_createThumbnail($tmpName, $fileNameFinal);

            move_uploaded_file($tmpName, $uploadDir);

            $image->name = $fileNameFinal;
            $image->path = WWW_ROOT . 'img/biens/';

            if ($imagesTable->save($image)) {
                $response = ["id" => $image->id, "image" => PATH_ADMIN . '/img/biens/' . $image->name];

                $this->response->body(json_encode($response));
                $this->response->type('application/json');

                return $this->response;
            }
        }
    }

    public function removeImage()
    {
        $this->viewBuilder()->layout('');
        $this->render(false);

        $imageId = $this->request->data['imageId'];
        $imagesTable = TableRegistry::get('Images');
        $entity = $imagesTable->get($imageId);
        $result = $imagesTable->delete($entity);

        if ($result) {
            $response = ["id" => $imageId, "deleted" => true];

            $this->response->body(json_encode($response));
            $this->response->type('application/json');

            return $this->response;
        }
    }

    public function orderImage(){
        $this->viewBuilder()->layout('');
        $this->render(false);

        $imageIdList = $this->request->data['imageIdList'];
        $imageIdList = implode(',',$imageIdList);

        $connection = ConnectionManager::get('default');
        $results = $connection->execute("UPDATE images SET sort_order = FIND_IN_SET(id, '$imageIdList') WHERE id in ($imageIdList)");

        if ($results) {
            $response = ["updated" => true];

            $this->response->body(json_encode($response));
            $this->response->type('application/json');

            return $this->response;
        }
    }

    private function _createThumbnail($path, $name)
    {

        $source = imagecreatefromjpeg($path); // La photo est la source
        $destination = imagecreatetruecolor(520, 330); // On crée la miniature vide

        // Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
        $largeur_source = imagesx($source);
        $hauteur_source = imagesy($source);
        $largeur_destination = imagesx($destination);
        $hauteur_destination = imagesy($destination);

        // On crée la miniature
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

        // On enregistre la miniature sous le nom "mini_couchersoleil.jpg"
        imagejpeg($destination, WWW_ROOT . 'img/biens/thumbnails/' . $name);

    }

    private function _saveImagesBiens($bien_id, $images)
    {
        $listImage = explode(",", $images);
        if (count($listImage) > 0) {
            $ImagesTable = TableRegistry::get('Images');

            $ImagesTable->updateAll(
                array('bien_id' => $bien_id),
                array('id IN' => $listImage)
            );
            $this->Flash->success(__('Le bien a été sauvegardé'));

            return $this->redirect('/admin/biens/edit/' . $bien_id);
        } else {
            $this->Flash->success(__('Le bien a été sauvegardé'));
            return $this->redirect('/admin/biens/edit/' . $bien_id);
        }
    }

    private function _stringToSlug($title)
    {
        $slug = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($title)));

        $query = $this->Biens->find();
        $query
            ->select(['count' => $query->func()->count('*')])
            ->where(['slug like' => '%' . $slug . '%'])
            ->order(['created' => 'DESC']);
        $result = $query->toList();
        $numHits = $result[0]['count'];


        return ($numHits > 0) ? ($slug . '-' . $numHits) : $slug;
    }

    private function _renameImage($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}
