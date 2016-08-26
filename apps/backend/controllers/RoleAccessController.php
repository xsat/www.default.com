<?php namespace Backend\Controllers;

use \Backend\Models\Role as RoleModel,
    \Backend\Models\Access as AccessModel,
    \Backend\Models\RoleAccess as RoleAssesModel,
    \Backend\Libraries\Grid\Buttons,
    \Backend\Libraries\Grid\Grid,
    \Backend\Libraries\Grid\Items\Item,
    \Backend\Libraries\Grid\Items\Link,
    \Backend\Libraries\Grid\Items\Link\GlyphiconLink;

class RoleAccessController extends ParentController
{
    public function indexAction()
    {
        $roles = RoleModel::find();
        $grid = new Grid(AccessModel::grid($roles), [
            new Item('resource', 'Resource'),
            new Item('access', 'Access'),
        ]);

        foreach ($roles as $role) {
            $grid->addItem(new Link([
                'for' => 'cap2-admin',
                'controller' => 'role_access',
                'action' => 'change',
                'first' => $role->id,
                'second' => '$access_id',
            ], [
                'title' => $role->name,
                'text' => '$text_' . $role->id,
                'class' => '$class_' . $role->id,
            ]));
    }

        $buttons = new Buttons([
            new GlyphiconLink([
                'for' => 'ca-admin',
                'controller' => 'role_access',
                'action' => 'save',
            ], 'save', [
                'class' => 'btn btn-sm btn-success',
            ]),
        ]);

        $this->view->setVars([
            'grid' => $grid,
            'buttons' => $buttons,
        ]);
    }

    public function changeAction($role_id = null, $access_id = null)
    {
        $changeStatus = RoleAssesModel::change($role_id, $access_id);

        return $this->response->setJsonContent([
            'html' => $changeStatus ? 'Allow' : 'Deny',
            'class'=> $changeStatus ? 'btn btn-sm btn-success ajax' : 'btn btn-sm btn-danger ajax',
        ]);
    }

    public function saveAction()
    {
        $this->flashSession->success('Saved');

        return $this->indexRedirect();
    }
}