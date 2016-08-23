<?php namespace Backend\Models;

class Access extends Model
{
    public $id;
    public $resource_id;
    public $name;

    public function initialize()
    {
        $this->belongsTo('resource_id', 'Backend\Models\Resource', 'id', ['alias' => 'resource']);
    }

    public function getResourceName()
    {
        return $this->resource->name;
    }
}