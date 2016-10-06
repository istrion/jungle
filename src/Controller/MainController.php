<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class MainController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->layout('main');
        /* chargement des menus du header*/

        $menus = TableRegistry::get('Menus');

        $queryMenus = $menus->find('all');
        $this->set(compact('queryMenus'));

        /* chargement du slider de la homepage*/
        $sliders = TableRegistry::get('Sliders');

        $querySliders = $sliders->find('all');
        $this->set(compact('querySliders'));

        /* chargement des derniers biens */
        $tableBiens = TableRegistry::get('Biens');
        $biens = $tableBiens->getLastBiens();
        /* derniers biens vendus */
        $recentSales = $tableBiens->getRecentSales();

        $this->set(compact('biens','recentSales'));

    }

    public function liste()
    {
        $this->viewBuilder()->layout('header_footer');
        $town = '';
        $town_id = '';
        $offer = '';
        $type_of_bien = '';
        $price = '';

        $queryParams = [];

        if (isset($this->request->query['town']) && $this->request->query['town_id'] != '' && is_numeric($this->request->query['town_id'])) {
            $queryParams[] = ['Biens.town_id = ' => $this->request->query['town_id']];
            $town_id = $this->request->query['town_id'];
            $town = $this->request->query['town'];
        }
        if (isset($this->request->query['offer']) && is_numeric($this->request->query['offer'])) {
            $queryParams[] = ['Biens.offer = ' => $this->request->query['offer']];
            $offer = $this->request->query['offer'];
        }
        if (isset($this->request->query['type_of_bien']) && is_numeric($this->request->query['type_of_bien'])) {
            $queryParams[] = ['Biens.type_of_bien = ' => $this->request->query['type_of_bien']];
            $type_of_bien = $this->request->query['type_of_bien'];
        }
        if (isset($this->request->query['price']) && is_numeric($this->request->query['price'])) {
            $queryParams[] = ['Biens.price <=' => $this->request->query['price']];
            $price = $this->request->query['price'];
        }


        $orderBy = $this->request->query('sortBy');
        $orderBy = ($orderBy == "asc") ? $orderBy : "desc";

        $this->paginate = [
            'maxLimit' => 12,
            'order' => [
                'Biens.price' => $orderBy
            ]
        ];

        $biens = TableRegistry::get('Biens');
        $biens = $biens->find('all')
            ->where($queryParams)
            ->contain(['ImagesBiens.Images']);
        $biens = $this->paginate($biens);

        $this->set(compact('biens'));
        $this->set(compact('town', 'town_id', 'offer', 'type_of_bien', 'price'));
        $this->set('_serialize', ['biens']);
    }

    public function details($slug = null)
    {
        $this->viewBuilder()->layout('header_footer');
        $biens = TableRegistry::get('Biens');
        $bien = $biens->find('all',
            [
                'conditions' => ['slug' => $slug],
                'contain' => ['Towns', 'Agents', 'Dpes']
            ]);
        $bien = $bien->first();

        $ImagesBiensTable = TableRegistry::get('ImagesBiens');

        $imagesBiens = $ImagesBiensTable->find('all',
            [
                'limit' => 200,
                'fields' => ['id', 'Images.name', 'Images.path'],
                'conditions' => ['ImagesBiens.bien_id ' => $bien->id]
            ])
            ->innerJoinWith('Images');
        //https://developers.facebook.com/docs/plugins/share-button
        $metasFB = [
            'title' => $bien->title,
            'description' => $bien->description,
            'image' => 'http://jungle.local/img/biens/1424169825-112082_7sdcm.jpg'
        ];

        $this->set(compact('bien'));
        $this->set(compact('imagesBiens'));
        $this->set(compact('metasFB'));
    }

    public function agents()
    {
        $this->viewBuilder()->layout('header_footer');
        $agents = TableRegistry::get('Agents');
        $resultsAgents = $agents->find('all');
        $this->set(compact('resultsAgents'));
    }
}