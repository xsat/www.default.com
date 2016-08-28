<?php namespace Backend\Controllers;

use \Backend\Models\Role\Builder as RoleBuilder,
    \Backend\Models\Role as RoleModel,
    \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Buttons,
    \Backend\Libraries\Grid\Breadcrumbs,
    \Backend\Libraries\Grid\Items\Item as GridItem,
    \Backend\Libraries\Grid\Items\Link as GridLink,
    \Backend\Libraries\Grid\Breadcrumbs\Item as BreadcrumbItem,
    \Backend\Libraries\Grid\Breadcrumbs\Link as BreadcrumbLink,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink,
    \Backend\Forms\RoleForm;

class RoleController extends ParentController
{
    public function indexAction()
    {
        $builder = new RoleBuilder();
        $form = new RoleForm($builder, 'Search');
        $form->bind($this->request->get(), $builder);

        $grid = new Grid($builder->execute(), [
            new GridItem('id', 'ID'),
            new GridItem('name'),
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

        $breadcrumbs = new Breadcrumbs([
            new BreadcrumbLink(['for' => 'home-admin'], 'Home'),
            new BreadcrumbItem('Roles'),
        ]);

        $this->view->setVars([
            'form' => $form,
            'grid' => $grid,
            'buttons' => $buttons,
            'breadcrumbs' => $breadcrumbs,
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

        $breadcrumbs = new Breadcrumbs([
            new BreadcrumbLink(['for' => 'home-admin'], 'Home'),
            new BreadcrumbLink([
                'for' => 'c-admin',
                'controller' => 'role',
            ], 'Roles'),
            new BreadcrumbItem('Create'),
        ]);

        $this->view->setVars([
            'form' => $form,
            'breadcrumbs' => $breadcrumbs,
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

        $breadcrumbs = new Breadcrumbs([
            new BreadcrumbLink(['for' => 'home-admin'], 'Home'),
            new BreadcrumbLink([
                'for' => 'c-admin',
                'controller' => 'role',
            ], 'Roles'),
            new BreadcrumbItem('Update'),
        ]);

        $this->view->setVars([
            'form' => $form,
            'breadcrumbs' => $breadcrumbs,
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