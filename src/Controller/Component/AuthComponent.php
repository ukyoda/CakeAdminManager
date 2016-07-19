<?php

namespace AdminManager\Controller\Component;

use Cake\Controller\Component\AuthComponent as BaseAuthComponent;

class AuthComponent extends BaseAuthComponent {

    public function loginAction($template = 'AdminManager./Login/form') {
        $controller = $this->_registry->getController();
        $controller->render($template);
        if($controller->request->is('post')) {
            $user = $this->identify();
            if($user) {
                $this->setUser($user);
                return $controller->redirect($this->redirectUrl());
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function logoutAction() {
        $controller = $this->_registry->getController();
        return $controller->redirect($this->logout());
    }

}
