<?php

namespace AdminManager\Controller;

use AdminManager\Controller\AdminController;
use Cake\ORM\TableRegistry;

class DashboardController extends AdminController {

    public function initialize() {
        parent::initialize();
        $this->Users = TableRegistry::get('Users');
    }

    public function index() {
        $this->setTitle(__('Dashboard'));
        $userCount = $this->Users->find()->count();
        $this->set('userCount', $userCount);
    }

}
