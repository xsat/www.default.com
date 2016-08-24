<?php namespace Backend\Models;

class Access extends Model
{
    public $id;
    public $resource_id;
    public $name;

    public function initialize()
    {
        $this->belongsTo('resource_id', 'Backend\Models\Resource', 'id', ['alias' => 'resource']);
        $this->hasMany('id', 'Backend\Models\RoleAccess', 'access_id', ['alias' => 'roles']);
    }

    public function getResourceName()
    {
        return $this->resource->name;
    }
}