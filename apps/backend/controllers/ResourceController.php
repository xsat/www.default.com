<?php namespace Backend\Controllers;

use \Backend\Models\Resource as ResourceModel,
    \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Buttons,
    \Backend\Libraries\Grid\Items\Item,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink,
    \Backend\Forms\ResourceForm;

class ResourceController extends ParentController
{
    public function indexAction()
    {
        $grid = new Grid(ResourceModel::find(), [
            new Item('id', 'ID'),
            new Item('name'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'resource',
                'action' => 'update',
                'params' => '$id',
            ], 'pencil', 'Update'),
            new GlyphiconLink([
                'for' => 'cap-admin',
                'controller' => 'resource',
                'action' => 'delete',
                'params' => '$id',
            ], 'trash', 'Delete'),
        ]);

        $buttons = new Buttons([
            new GlyphiconLink([
                'for' => 'ca-admin',
                'controller' => 'resource',
                'action' => 'create',
            ], 'plus', [
                'class' => 'btn btn-sm btn-success',
            ]),
        ]);

        $this->view->setVars([
            'grid' => $grid,
            'buttons' => $buttons,
        ]);
    }

    public function createAction()
    {
        $model = new ResourceModel();
        $form = new ResourceForm($model, 'Create');

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
        $model = ResourceModel::findFirst($id);
        if (!$model) {
            $this->flashSession->error('Model not found');
            return $this->indexRedirect();
        }

        $form = new ResourceForm($model, 'Update');

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
        $model = ResourceModel::findFirst($id);
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