<?php namespace Backend\Models;

class Admin extends Model
{
    public $id;
    public $role_id;
    public $email;
    public $name;
    public $password;

    public function initialize()
    {
        $this->belongsTo('role_id', 'Backend\Models\Role', 'id', ['alias' => 'role']);
    }
}