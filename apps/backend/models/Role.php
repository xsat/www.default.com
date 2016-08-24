<?php namespace Backend\Models;

class Role extends Model
{
    public $in;
    public $name;

    public function initialize()
    {
        $this->hasMany('id', 'Backend\Models\RoleAccess', 'role_id', ['alias' => 'accesses']);
    }

    public static function grid($roles)
    {
        $data = [];
        $accesses = Access::find();

        foreach ($accesses as $key => $access) {
            $data[$key] = [
                'resource' => $access->resource->name,
                'access' => $access->name,
                'access_id' => $access->id,
            ];

            foreach ($roles as $role) {
                $isAllow = RoleAccess::isAllow($role->id, $access->id);
                $data[$key][$role->name] = RoleAccess::getStatusText($isAllow);
                $data[$key]['role_' . $role->id] = $role->id;
            }
        }

        return $data;
    }
}