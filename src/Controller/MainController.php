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
        $imagesBiens = TableRegistry::get('ImagesBiens');
        $biens = TableRegistry::get('Biens');
        $queryBiens = $biens->find('all', [
            'order' => ['Biens.created' => 'DESC']
        ])->limit(15);

        $biens = [];

        foreach ($queryBiens as $bien) {
            $bien->images = [];

            $images = $imagesBiens->find('all')
                ->where(["ImagesBiens.bien_id" => $bien->id])
                ->contain('Images');

            foreach ($images as $img) {
                array_push($bien->images, $img->image);
            }

            array_push($biens, $bien);
        }
        $this->set(compact('biens'));

    }

    public function liste()
    {
        $this->viewBuilder()->layout('header_footer');
        $queryParams = [];

        if($this->request->query['town'] && $this->request->query['town_id'] != '' && is_numeric($this->request->query['town_id'])) {
            $queryParams[] = ['Biens.town_id = ' => $this->request->query['town_id']];
        }
        if($this->request->query['offer'] && is_numeric($this->request->query['offer'])) {
            $queryParams[] = ['Biens.offer = ' => $this->request->query['offer']];
        }
        if($this->request->query['type_of_bien'] && is_numeric($this->request->query['type_of_bien'])) {
            $queryParams[] = ['Biens.type_of_bien = ' => $this->request->query['type_of_bien']];
        }
        if($this->request->query['price'] && is_numeric($this->request->query['price'])) {
            $queryParams[] = ['Biens.price <=' => $this->request->query['price']];
        }



        $orderBy = $this->request->query('sortBy');
        $orderBy = ($orderBy == "asc") ? $orderBy:"desc";

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
        $this->set('_serialize', ['biens']);
    }

    public function details($slug = null)
    {
        $this->viewBuilder()->layout('header_footer');
        $biens = TableRegistry::get('Biens');
        $bien = $biens->find('all',
            [
                'conditions'=> ['slug' => $slug],
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
}