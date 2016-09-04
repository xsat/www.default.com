<?php namespace Backend\Models;

use \Common\Models\Model as CommonModel;

class Model extends CommonModel
{
    public function afterCreate()
    {

    }

    public function afterUpdate()
    {

    }

    public function beforeDelete()
    {

    }

    private function createActivity()
    {
        $admin_id = 0;
        $dispatcher = $this->getDI()->get('dispatcher');
        $activity = new Activity();
        $activity->assign([
            'admin_id' => $admin_id,
            'controller' => $dispatcher->getControllerName(),
            'action' => $dispatcher->getActionName(),
            'data' => [
                'Class' => __CLASS__,
                'Table' => $this->getSource(),
                'Id' => $this->id,
            ],
        ]);
        $activity->create();
    }
}
