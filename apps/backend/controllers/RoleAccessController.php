<?php namespace Backend\Controllers;

use \Backend\Models\Role as RoleModel,
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
        $grid = new Grid(RoleModel::grid($roles), [
            new Item('resource', 'Resource'),
            new Item('access', 'Access'),
        ]);

        foreach ($roles as $role) {
            $grid->addItem(new Link([
                'for' => 'cap2-admin',
                'controller' => 'role_access',
                'action' => 'change',
                'first' => '$role_' . $role->id,
                'second' => '$access_id',
            ], $role->name, $role->name));
        }

        $buttons = new Buttons([
            new GlyphiconLink([
                'for' => 'ca-admin',
                'controller' => 'role_access',
                'action' => 'save',
            ], 'save'),
        ]);

        $this->view->setVars([
            'grid' => $grid,
            'buttons' => $buttons,
        ]);
    }

    public function changeAction($role_id = null, $access_id = null)
    {
        if (RoleAssesModel::change($role_id, $access_id)) {
            $this->flashSession->success('Allow');
        } else {
            $this->flashSession->error('Deny');
        }


        return $this->indexRedirect();
    }

    public function saveAction()
    {
        $this->flashSession->success('Saved');

        return $this->indexRedirect();
    }
}