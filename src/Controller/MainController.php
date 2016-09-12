<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class MainController extends AppController
{
    public function index()
    {
        /* chargement des menus du header*/

        $menus = TableRegistry::get('Menus');

        $queryMenus = $menus->find('all');
        $this->set(compact('queryMenus'));

        /* chargement du slider de la homepage*/
        $sliders = TableRegistry::get('Sliders');

        $querySliders = $sliders->find('all');
        $this->set(compact('querySliders'));

    }

    public function view($id = null)
    {
        $menus = $this->Menus->Find('All');
        $this->set(compact('menus'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set('article', $article);

        // Just added the categories list to be able to choose
        // one category for an article
        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Votre article a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour votre article.'));
        }

        $this->set('article', $article);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__("L'article avec l'id: {0} a été supprimé.", h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}