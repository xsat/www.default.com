<?php namespace Backend\Models;

class Role extends Model
{
    public $in;
    public $name;

    public function initialize()
    {
        $this->hasMany('id', 'Backend\Models\RoleAccess', 'role_id', ['alias' => 'accesses']);
    }
}