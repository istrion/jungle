<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\I18n\Time;


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


        $this->set(compact('biens', 'recentSales', 'testimonies'));

    }

    public function liste()
    {
        $this->viewBuilder()->layout('header_footer');
        $sectors = '';
        $sectors_id = '';
        $offer = '';
        $type_of_bien = '';
        $price = '';

        $queryParams = [];

        if (isset($this->request->data['sectors']) && $this->request->data['sectors_id'] != '') {
            $sectors_id_array = explode(',', $this->request->data['sectors_id']);
            $queryParams[] = ['Biens.secteur_id in ' => $sectors_id_array];
            $sectors_id = $this->request->data['sectors_id'];
            $sectors = $this->request->data['sectors'];
        }
        if (isset($this->request->data['offer']) && is_numeric($this->request->data['offer'])) {
            $queryParams[] = ['Biens.offer = ' => $this->request->data['offer']];
            $offer = $this->request->data['offer'];
        }
        if (isset($this->request->data['type_of_bien']) && is_numeric($this->request->data['type_of_bien'])) {
            $queryParams[] = ['Biens.type_of_bien = ' => $this->request->data['type_of_bien']];
            $type_of_bien = $this->request->data['type_of_bien'];
        }
        if (isset($this->request->data['price']) && is_numeric($this->request->data['price'])) {
            $queryParams[] = ['Biens.price <=' => $this->request->data['price']];
            $price = $this->request->data['price'];
        }


        if ($this->request->query('sortBy')) {
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
        $biens = $biens->find('all',
            array('conditions' => $queryParams))
            ->contain(['ImagesBiens.Images']);
        $biens = $this->paginate($biens);


        $this->set(compact('biens'));
        $this->set(compact('sectors', 'sectors_id', 'offer', 'type_of_bien', 'price'));
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

        $identicalBiens = $biens->getIdenticalBiens($bien->type_of_bien, $bien->price, $bien->secteur_id, $bien->id);

        $this->set(compact('bien', 'identicalBiens', 'imagesBiens', 'metasFB'));

        $this->saveStats($bien->id);
    }

    public function agents()
    {
        $this->viewBuilder()->layout('header_footer');
        $agents = TableRegistry::get('Agents');
        $resultsAgents = $agents->find('all');
        $this->set(compact('resultsAgents'));
    }

    public function sendEstimation()
    {


        $this->viewBuilder()->layout(false);
        $this->render(false);
        $this->autoRender = false;

        $message = '';
        $message .= $this->request->data['civility'] . ' ' . $this->request->data['name'] . '<br />';
        $message .= 'de ' . $this->request->data['town'] . '<br />';
        $message .= 'pour ' . $this->request->data['type-bien'] . '<br />';
        $message .= 'Email : ' . $this->request->data['email'] . '<br />';
        $message .= 'Téléphone : ' . $this->request->data['tel'] . '<br />';

        $email = new Email('default');

        $email->from(['mickael.poulachon@gmail.com' => 'My Site'])
            ->to('mickael.poulachon@gmail.com')
            ->subject('About')
            ->emailFormat('html')
            ->send($message);
    }

    public function sendAgentEmail() {
        $this->viewBuilder()->layout(false);
        $this->render(false);
        $this->autoRender = false;

        $message = '';
        $message .= 'de : ' . $this->request->data['clientName'] . '<br />';
        $message .= 'email : ' . $this->request->data['clientEmail'] . '<br />';
        $message .= 'Téléphone : ' . $this->request->data['clientTel'] . '<br />';
        $message .= 'Message : <br /> ---------------------------------------------<br/>' . $this->request->data['clientMessage'] . '<br />---------------------------------------------';

        $email = new Email('default');

        $email->from(['mickael.poulachon@gmail.com' => 'My Site'])
            ->to('mickael.poulachon@gmail.com')
            ->subject('Demande de renseignement')
            ->emailFormat('html')
            ->send($message);
    }

    private function saveStats($bienId)
    {
        $ip = $_SERVER['REMOTE_ADDR']; // L'adresse IP du visiteur
        $date = date('Y-M-d');
        $date = Time::parseDate($date, 'Y-M-d');

        $statsTable = TableRegistry::get('Stats');
        $stats = $statsTable->newEntity();

        $stats = $statsTable->patchEntity($stats, [
            'ip' => $ip,
            'date_visited' => $date,
            'biens_id' => $bienId
        ]);

        $statsTable->save($stats);


    }
}