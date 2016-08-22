<?php namespace Backend\Models;

class Access extends Model
{
    public $id;
    public $resource_id;
    public $name;

    public function initialize()
    {
        $this->belongsTo('resource_id', 'Common\Models\Access', 'id', ['alias' => 'resource']);
    }
}