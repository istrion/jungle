<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller\admin;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppAdminController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Biens',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ]
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {

        if($this->name != 'Users' && $this->request->params['action'] != 'login') {
            $this->viewBuilder()->layout('admin');
            $this->set('adminMenus', $this->_getMenu($this->name));
        }

        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->Auth->allow(['index', 'view', 'display']);

    }

    private function _getMenu($activeMenu) {
        return array(
                ['link' => '/admin/menus', 'title' => 'Menu' , 'active' => ($activeMenu == 'menus') ? true:false],
                ['link' => '/admin/biens', 'title' => 'Biens' , 'active' => ($activeMenu == 'biens') ? true:false],
                ['link' => '/admin/agents', 'title' => 'Agents' , 'active' => ($activeMenu == 'Agents') ? true:false],
                ['link' => '/admin/sliders', 'title' => 'Sliders' , 'active' => ($activeMenu == 'Sliders') ? true:false],
                ['link' => '/admin/towns', 'title' => 'Villes' , 'active' => ($activeMenu == 'towns') ? true:false],
                ['link' => '/admin/testimonies', 'title' => 'Témoignages' , 'active' => ($activeMenu == 'testimonies') ? true:false],
                ['link' => '/admin/exclusivities', 'title' => 'Exclusivités' , 'active' => ($activeMenu == 'exclusivities') ? true:false]
            );
    }
}
