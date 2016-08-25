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
                'access_id' => $access->id,
            ];

            foreach ($roles as $role) {
                $isAllow = RoleAccess::isAllow($role->id, $access->id);
                $data[$key]['text_' . $role->id] = RoleAccess::getStatusText($isAllow);
                $data[$key]['class_' . $role->id] = RoleAccess::getStatusClass($isAllow);
            }
        }

        return $data;
    }
}