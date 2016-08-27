<?php namespace Backend\Models;

class RoleAccess extends Model
{
    const STATUS_ALLOW = 1;
    const STATUS_DENY = 0;

    public $in;
    public $role_id;
    public $access_id;
    public $status = self::STATUS_DENY;

    public function initialize()
    {
        $this->belongsTo('role_id', 'Backend\Models\Role', 'id', ['alias' => 'role']);
        $this->belongsTo('access_id', 'Backend\Models\Access', 'id', ['alias' => 'access']);
    }

    public static function change($role_id, $access_id)
    {
        $roleAccess = self::findFirst([
            'conditions' => 'role_id = :role_id: AND access_id = :access_id:',
            'bind' => [
                'role_id' => $role_id,
                'access_id' => $access_id,
            ],
        ]);

        if (!$roleAccess) {
            $roleAccess = new self();
            $roleAccess->role_id = $role_id;
            $roleAccess->access_id = $access_id;
        }

        if ($roleAccess->status == self::STATUS_ALLOW) {
            $roleAccess->status = self::STATUS_DENY;
        } else {
            $roleAccess->status = self::STATUS_ALLOW;
        }

        $roleAccess->save();

        return $roleAccess->status == self::STATUS_ALLOW;
    }

    public static function isAllow($role_id, $access_id)
    {
        $roleAccess = self::findFirst([
            'conditions' => 'role_id = :role_id: AND access_id = :access_id: AND status = :status:',
            'bind' => [
                'role_id' => $role_id,
                'access_id' => $access_id,
                'status' => self::STATUS_ALLOW,
            ],
        ]);

        return $roleAccess != false;
    }

    public static function getStatusText($status)
    {
        return $status ? 'Allow' : 'Deny';
    }

    public static function getStatusClass($status)
    {
        return $status ? 'btn btn-sm btn-success ajax' : 'btn btn-sm btn-danger ajax';
    }
}