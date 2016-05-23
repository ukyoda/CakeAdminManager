<?php

namespace AdminManager\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController {

  public function initialize() {
      parent::initialize();
      $this->viewBuilder()->layout('AdminManager.default');
      $this->setAuthComponent();
  }

  /**
   * 専用のログイン処理
   */
  protected function setAuthComponent() {
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Auth', [
        'authenticate' => [
            'Form' => [
                'userModel' => 'Users',
                'finder' => 'auth',
                'fields' => [
                    'username' => 'mail_address',
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
        ]
    ]);
  }


}
