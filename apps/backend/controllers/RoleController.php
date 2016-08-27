<?php namespace Backend\Controllers;

use \Backend\Models\Role as RoleModel,
    \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Buttons,
    \Backend\Libraries\Grid\Items\Item,
    \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink,
    \Backend\Forms\RoleForm;

class RoleController extends ParentController
{
    public function indexAction()
    {
        $model = new RoleModel();
        $form = new RoleForm($model, 'Search');
        $form->bind($this->request->get(), $model);

        $grid = new Grid(RoleModel::find(), [
            new Item('id', 'ID'),
            new Item('name'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'role',
                'action' => 'update',
                'params' => '$id',
            ], 'pencil', 'Update'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'role',
                'action' => 'delete',
                'params' => '$id',
            ], 'trash', 'Delete'),
        ]);

        $buttons = new Buttons([
            new GlyphiconLink([
                'for' => 'ca-admin',
                'controller' => 'role',
                'action' => 'create',
            ], 'plus', [
                'class' => 'btn btn-sm btn-success',
            ]),
        ]);

        $this->view->setVars([
            'form' => $form,
            'grid' => $grid,
            'buttons' => $buttons,
        ]);
    }

    public function createAction()
    {
        $model = new RoleModel();
        $form = new RoleForm($model, 'Create');

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
        $model = RoleModel::findFirst($id);
        if (!$model) {
            $this->flashSession->error('Model not found');
            return $this->indexRedirect();
        }

        $form = new RoleForm($model, 'Update');

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
        $model = RoleModel::findFirst($id);
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