<?php

namespace AdminManager\Controller;

use AdminManager\Controller\AppController;
use Cake\Event\Event;

class AdminController extends AppController {
    protected $title = 'No Title';

    public function initialize() {
        parent::initialize();
        $this->authSetup([
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
        ], 'AdminManager.Users');
        if(!$this->Auth->user()) {
            $this->viewBuilder()->layout('no-side');
        } else {
            $this->viewBuilder()->layout('AdminManager.default');
        }

    }

    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->set('title', $this->getTitle());
    }

    protected function setTitle($title) {
        $this->title = $title;
    }

    protected function getTitle() {
        return $this->title;
    }

    protected function _getDefaultAuthConfig() {
        $config = parent::_getDefaultAuthConfig();
        $config['authenticate']['Form']['finder'] = 'admin';
        return $config;
    }

}
