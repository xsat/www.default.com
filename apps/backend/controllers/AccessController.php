<?php namespace Backend\Controllers;

use \Backend\Models\Access as AccessModel,
    \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Buttons,
    \Backend\Libraries\Grid\Items\Item,
    \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink,
    \Backend\Forms\AccessForm;

class AccessController extends ParentController
{
    public function indexAction()
    {
        $grid = new Grid(
            AccessModel::find(), [
            new Item('id', 'ID'),
            new Item('name'),
            new Link([
                'for' => 'cap-admin',
                'controller' => 'resource',
                'action' => 'update',
                'params' => '$resource_id',
            ], 'resource_name'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'access',
                'action' => 'update',
                'params' => '$id',
            ], 'pencil', 'Update'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'access',
                'action' => 'delete',
                'params' => '$id',
            ], 'trash', 'Delete'),
        ]);

        $buttons = new Buttons([
            new GlyphiconLink([
                'for' => 'ca-admin',
                'controller' => 'access',
                'action' => 'create',
            ], 'plus'),
        ]);

        $this->view->setVars([
            'grid' => $grid,
            'buttons' => $buttons,
        ]);
    }

    public function createAction()
    {
        $model = new AccessModel();
        $form = new AccessForm($model, 'Create');

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

        $form = new AccessForm($model, 'Update');

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