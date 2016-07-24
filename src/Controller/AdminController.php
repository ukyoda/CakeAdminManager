<?php

namespace AdminManager\Controller;

use AdminManager\Controller\AppController;
use Cake\Event\Event;

class AdminController extends AppController {
    protected $title = 'No Title';

    public function initialize() {
        parent::initialize();
        $this->loadComponent('AdminManager.AccessLog');
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
        if(!$this->Auth->user()) { # ログインしてなかった時はサイドメニューなしのレイアウトを使用
            $this->viewBuilder()->layout('AdminManager.no-side');
            //$this->AccessLog->write();
        } else { # ログイン時はサイドメニューありのレイアウトを使用
            $this->viewBuilder()->layout('AdminManager.default');
            //$this->AccessLog->write($this->Auth->user('id'));
        }
    }

    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        $this->set('title', $this->getTitle());
    }

    // ページタイトルをセットする
    protected function setTitle($title) {
        $this->title = $title;
    }

    // ページタイトルを取得する
    protected function getTitle() {
        return $this->title;
    }

    // Authコンポーネントの認証ロジックをadminに変更
    protected function _getDefaultAuthConfig() {
        $config = parent::_getDefaultAuthConfig();
        $config['authenticate']['Form']['finder'] = 'admin';
        return $config;
    }

}
