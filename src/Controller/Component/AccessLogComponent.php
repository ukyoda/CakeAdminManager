<?php

namespace AdminManager\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class AccessLogComponent extends Component {
    protected $table;
    public function initialize() {
        $this->table = TableRegistry::get('AccessLogs');
    }
    public function write() {
        $controller = $this->_registry->getController();
    }

    public function logoutAction() {
        $controller = $this->_registry->getController();
        return $controller->redirect($this->logout());
    }

}
