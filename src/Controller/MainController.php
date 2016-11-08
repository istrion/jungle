<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;


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
        /* derniers témoignages */
        $tableTestimonies = TableRegistry::get('Testimonies');
        $testimonies = $tableTestimonies->getLastTestimonies();



        $this->set(compact('biens','recentSales', 'testimonies'));

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


        if($this->request->query('sortBy')) {
            $orderBy = $this->request->query('sortBy');
            $orderBy = ($orderBy == "asc") ? ['Biens.price' => 'asc'] : ['Biens.price' => 'desc'];
        } else {
            $orderBy = ['Biens.created' => 'DESC'];
        }

        $this->paginate = [
            'maxLimit' => 12,
            'order' => $orderBy
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

        $identicalBiens = $biens->getIdenticalBiens($bien->type_of_bien,$bien->price,$bien->secteur_id, $bien->id);

        $this->set(compact('bien','identicalBiens','imagesBiens', 'metasFB'));
    }

    public function agents()
    {
        $this->viewBuilder()->layout('header_footer');
        $agents = TableRegistry::get('Agents');
        $resultsAgents = $agents->find('all');
        $this->set(compact('resultsAgents'));
    }

    public function sendEstimation(){


        $this->viewBuilder()->layout(false);
        $this->render(false);
        $this->autoRender = false;

        $message = '';
        $message .= $this->request->data['civility'] .' '. $this->request->data['name'] . '<br />';
        $message .= 'de ' . $this->request->data['town']. '<br />';
        $message .= 'pour ' . $this->request->data['type-bien']. '<br />';
        $message .= 'Email : '.$this->request->data['email']. '<br />';
        $message .= 'Téléphone : '. $this->request->data['tel']. '<br />';

        $email = new Email('default');

        $email->from(['mickael.poulachon@gmail.com' => 'My Site'])
            ->to('mickael.poulachon@gmail.com')
            ->subject('About')
            ->emailFormat('html')
            ->send($message);
    }
}