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
    protected function authSetup($config = []) {
        $defaultConfig = [];
        $config = array_merge($defaultConfig, $config);
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('AdminManager.Auth', $config);
    }

}
