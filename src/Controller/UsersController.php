<?php

namespace AdminManager\Controller;

use AdminManager\Controller\AdminController;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class UsersController extends AdminController {

    public function initialize() {
        parent::initialize();
        if(Configure::read('debug')) {
            $this->Auth->allow([ 'login', 'create' ] );
        }
        $this->loadComponent('Paginator');
        $this->Users = TableRegistry::get('AdminManager.Users');
        $this->RoleMst = TableRegistry::get('AdminManager.RoleMst');
    }

    public function index() {
        $this->setTitle('ユーザ一覧');
        $this->paginate = [
            'contain' => ['RoleMst'],
            'limit' => 25
        ];
        $users = $this->paginate($this->Users);
        $this->set('users', $users);
    }

    public function view($id) {
        $user = $this->Users->get($id, [
          'contain' => ['RoleMst']
        ]);
        $this->setTitle($user->name);
        $this->set('user', $user);
    }

    public function delete($id) {
        $user = $this->Users->get($id);
        // 自分は削除できない
        if($this->Auth->user('id') === $id) {
            $this->Flash->warning('自分は削除できません');
            return $this->Redirect(['action' => 'index']);
        }
        if($this->request->is(['post', 'delete'])) {
            $this->request->allowMethod(['post', 'delete']);
            if($this->Users->delete($user)) {
                $this->Flash->success(__('ユーザを削除しました'));
                return $this->Redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('削除に失敗しました'));
            }
        }
        $this->setTitle('停止: '.$user->name);
        $this->set('user', $user);
     }

    public function edit($id) {

        $user = $this->Users->get($id);
        // ロール
        $roleMst = $this->RoleMst->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);

        $status = $this->saveUser($user);
        if($status == 1) {
            $this->Flash->success(__('Success!!'));
            return $this->redirect(['action' => 'view', 'id' => $id]);
        } else if($status == -1){
            $this->Flash->error(__('入力項目にエラーがあります。修正してください'));
        }
        $this->setTitle('編集: '.$user->name);
        $this->set(compact('user'));
        $this->set(compact('user', 'roleMst'));
        $this->set('_serialize', ['user', 'roleMst']);

    }

    public function editPassword($id) {
        $user = $this->Users->get($id);
        // パスワードは隠す
        $user->password = '';
        $status = $this->saveUser($user);
        if($status == 1) {
            $this->Flash->success(__('Success!!'));
            return $this->redirect(['action' => 'view', 'id' => $id]);
        } else if($status == -1) {
            $this->Flash->error(__('入力項目にエラーがあります。修正してください'));
        }
        $this->setTitle('パスワード変更: '.$user->name);
        $this->set('user', $user);
    }

    /**
     * ユーザ作成
     */
    public function create() {
        $this->setTitle('新規ユーザ作成');
        // ロール
        $roleMst = $this->RoleMst->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        // ユーザ
        $user = $this->Users->newEntity();
        $status = $this->saveUser($user);
        if($status == 1) {
            $this->Flash->success(__('ユーザを作成しました'));
            return $this->redirect(['action' => 'index']);
        } else if($status == -1){
            $this->Flash->error(__('ユーザの作成に失敗しました。もう一度入力しなおして下さい'));
        }
        $this->set(compact('user'));
        $this->set(compact('user', 'roleMst'));
        $this->set('_serialize', ['user', 'roleMst']);
    }


    public function login() {
        $this->viewBuilder()->layout('no-side');
        if(!$this->Auth->loginAction()) {
            $this->Flash->error('入力項目にミスがあります');
        }
    }

    public function logout() {
        $this->Auth->logoutAction();
    }


    /**
     * ユーザデータ操作
     * @return 0: 変更なし, 1: 変更あり, -1: 失敗
     */
    protected function saveUser($user) {
        if($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if($this->Users->save($user)) {
                return 1;
            } else {
                return -1;
            }
        }
        return 0;
    }
}
