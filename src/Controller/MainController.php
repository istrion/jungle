<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class MainController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->layout('main');

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

        $biens =[];

        foreach($queryBiens as $bien) {
            $bien->images =[];

            $images = $imagesBiens->find('all')
                ->where(["ImagesBiens.bien_id" => $bien->id])
            ->contain('Images');

            foreach($images as $img){
                array_push($bien->images,$img->image);
            }

            array_push($biens,$bien);
        }
        $this->set(compact('biens'));

    }


    public function details($slug = null)
    {
        $this->viewBuilder()->layout('header_footer');
        echo $slug;
    }
}