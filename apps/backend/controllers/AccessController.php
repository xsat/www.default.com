<?php namespace Backend\Controllers;

use \Backend\Models\Access as AccessModel,
    \Backend\Forms\AccessForm;

class AccessController extends ParentController
{
    public function indexAction()
    {
    }

    public function createAction()
    {
        $model = new AccessModel();
        $form = new AccessForm($model);

        if ($this->postModelForm($model, $form)) {
            if ($model->create()) {
                $this->flashSession->success('Model was created');
            } else {
                $this->flashSession->error('Model was not created');
            }

            return $this->indexRedirect();
        }

        $this->view->setVars([
            'form' => $form,
        ]);
    }

    public function updateAction($id = null)
    {
        $model = AccessModel::findFirst($id);
        if (!$model) {
            $this->flashSession->error('Model not found');
            return $this->indexRedirect();
        }

        $form = new AccessForm($model);

        if ($this->postModelForm($model, $form)) {
            if ($model->update()) {
                $this->flashSession->success('Model was updated');
            } else {
                $this->flashSession->error('Model was not updated');
            }

            return $this->indexRedirect();
        }

        $this->view->setVars([
            'form' => $form,
        ]);
    }

    public function deleteAction($id = null)
    {
        $model = AccessModel::findFirst($id);
        if (!$model) {
            $this->flashSession->error('Model not found');
        } else {
            if ($model->delete()) {
                $this->flashSession->success('Model was deleted');
            } else {
                $this->flashSession->error('Model was not deleted');
            }
        }

        return $this->indexRedirect();
    }
}