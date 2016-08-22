<?php namespace Backend\Controllers;

use \Common\Controllers\ParentController as CommonParentController;

abstract class ParentController extends CommonParentController
{
    protected function postModelForm(&$model, &$form)
    {
        if ($this->request->getPost()) {
            $form->bind($this->request->getPost(), $model);

            if ($form->isValid()) {
                return true;
            }

            foreach ($model->getMessages() as $message) {
                $this->flashSession->error($message);
            }
        }

        return false;
    }

    protected function indexRedirect()
    {
        return $this->response->redirect([
            'for' => 'ca-admin',
            'controller' => $this->dispatcher->getControllerName(),
            'action' => 'index',
        ]);
    }
}
