<?php

namespace AdminManager\Controller;

use AdminManager\Controller\AppController;
use Cake\ORM\TableRegistry;

class DashboardController extends AppController {

  public function initialize() {
    parent::initialize();
    $this->Users = TableRegistry::get('Users');
  }

  public function index() {
    $this->set('title', __('Dashboard'));
    $userCount = $this->Users->find()->count();
    $this->set('userCount', $userCount);
  }

}
