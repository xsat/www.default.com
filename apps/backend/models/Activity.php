<?php namespace Backend\Models;

use \Common\Models\Model as CommonModel;

class Activity extends CommonModel
{
    public $id;
    public $admin_id;
    public $controller;
    public $action;
    public $data;
    public $date_create;

    public function initialize()
    {
        $this->belongsTo('admin_id', 'Backend\Models\Admin', 'id', ['alias' => 'admin']);
    }

    public function beforeCreate()
    {
        $this->date_create = $this->now();
    }

    public function setData($data)
    {
        $this->data = json_encode($data);
    }

    public function getData()
    {
        return json_decode($this->data, true);
    }
}