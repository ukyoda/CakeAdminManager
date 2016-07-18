<?php

namespace AdminManager\Controller\Component;

use Cake\Controller\Component\AuthComponent as BaseAuthComponent;

class AuthComponent extends BaseAuthComponent {
    protected $_defaultAuthenticate = [
        'Form' => [
            'userModel' => 'AdminManager.Users',
            'finder' => 'auth',
            'fields' => [
                'username' => 'login_name',
                'password' => 'password'
            ]
        ]
    ];
    public function initialize(array $config) {
        if(!array_key_exists('authenticate', $config)) {
            $config['authenticate'] = [];
        }
        $config['authenticate'] = array_merge(
            $this->_defaultAuthenticate,
            $config['authenticate']
        );
        $this->config($config);
        parent::initialize($config);
        $this->sessionKey = 'AdminManager.Users';
    }

}
