<?php

namespace AdminManager\Controller;

use Cake\Controller\Controller as BaseController;
use Cake\Event\Event;

class AppController extends BaseController {

    public function initialize() {
        parent::initialize();
    }

    /**
     * 専用のログイン処理
     */
    protected function authSetup($config = [], $sessionKey = 'Users') {
        $defaultConfig = $this->_getDefaultAuthConfig();
        $config = array_merge($defaultConfig, $config);
        $this->log($config);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('AdminManager.Auth', $config);
        $this->Auth->sessionKey = $sessionKey;
    }

    protected function _getDefaultAuthConfig() {
        return [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'AdminManager.Users',
                    'finder' => 'auth',
                    'fields' => [
                        'username' => 'login_name',
                        'password' => 'password'
                    ]
                ]
            ]
        ];
    }

}
