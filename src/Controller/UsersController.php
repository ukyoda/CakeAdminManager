<?php

namespace AdminManager\Controller;
use AdminManager\Controller\AppController;

class UsersController extends AppController {

  public function index() {
    $this->set('title', __('ユーザ一覧'));
    $users = $this->Users->find()->all();
    $this->set('users', $users);
  }

  /**
   * ログイン処理作成
   */
  public function login() {
    $this->viewBuilder()->layout('bukuman-no-side');

    if($this->request->is('post')) {
      $user = $this->Auth->identify();
      if($user) {
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error('メールアドレスまたはパスワードが間違っています。');
    }
  }

  /**
   * ログアウト
   */
  public function logout() {
      $this->redirect($this->Auth->logout());
  }


}
