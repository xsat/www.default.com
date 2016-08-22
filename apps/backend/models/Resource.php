<?php namespace Backend\Models;

class Resource extends Model
{
    public $id;
    public $name;

    public function initialize()
    {
        $this->hasMany('id', 'Common\Models\Access', 'resource_id', ['alias' => 'accesses']);
    }
}