<?php

namespace AdminManager\Controller;

use App\Controller\AppController as BaseController;
use Cake\Event\Event;

class AppController extends BaseController {

    public function initialize() {
        parent::initialize();
        $this->setAuthComponent();
    }

    /**
     * 専用のログイン処理
     */
    protected function setAuthComponent($config = []) {
        $defaultConfig = [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'AdminManager.Users',
                    'finder' => 'auth',
                    'fields' => [
                        'username' => 'screen_name',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginRedirect' => [  // ログイン後に表示するページ
                'controller' => 'dashboard',
                'action' => 'index'
            ],
            'logoutRedirect' => [   // ログアウト後に表示するページ
                'controller' => 'users',
                'action' => 'login'
            ],
            'loginAction' => [
                'controller' => 'users',
                'action' => 'login'
            ],
        ];
        $config = array_merge($defaultConfig, $config);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', $config);
        $this->Auth->sessionKey = 'AdminManager.Users';
    }

}
