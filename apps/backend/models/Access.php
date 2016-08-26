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

    public static function grid($roles)
    {
        $data = [];
        foreach (self::getAccesses() as $key => $access) {
            $data[$key] = [
                'access' => $access['access_name'],
                'resource' => $access['resource_name'],
                'access_id' => $access['access_id'],
            ];

            foreach ($roles as $role) {
                $isAllow = RoleAccess::isAllow($role->id, $access['access_id']);
                $data[$key]['text_' . $role->id] = RoleAccess::getStatusText($isAllow);
                $data[$key]['class_' . $role->id] = RoleAccess::getStatusClass($isAllow);
            }
        }

        return $data;
    }

    public static function getAccesses()
    {
        return self::query()
            ->columns([
                'access_id' => 'Backend\Models\Access.id',
                'resource_id' => 'Backend\Models\Resource.id',
                'access_name' => 'Backend\Models\Access.name',
                'resource_name' => 'Backend\Models\Resource.name',
            ])->innerJoin('Backend\Models\Resource',
                'Backend\Models\Access.resource_id = Backend\Models\Resource.id')
            ->groupBy(['Backend\Models\Access.id'])
            ->orderBy('Backend\Models\Resource.name, Backend\Models\Access.name')
            ->execute()
            ->toArray();
    }
}