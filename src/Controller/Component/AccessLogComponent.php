<?php

namespace AdminManager\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


class AccessLogComponent extends Component {
    protected $table;
    public function initialize(array $config) {
        parent::initialize($config);
        $this->table = TableRegistry::get('AccessLogs');
    }

    public function write($user_id = 0) {
        $controller = $this->_registry->getController();
        $accessLog = $this->table->newEntity();
        $accessLog->user_id = $user_id;
        $accessLog->endpoint = $controller->request->here;
        $accessLog->type = $controller->request->method();
        if($controller->request->is('get')) {
            $accessLog->param = json_encode($controller->request->query);
        } else {
            $accessLog->param = json_encode($controller->request->data);
        }
        return $this->table->save($accessLog);
    }

    public function logoutAction() {
        $controller = $this->_registry->getController();
        return $controller->redirect($this->logout());
    }

}
