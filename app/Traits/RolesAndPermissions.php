<?php

namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait RolesAndPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    public function hasRole($roles) {
        if($roles instanceof Collection) {
            foreach ($roles as $role) {
                if ($this->roles->contains('slug', $role)) {
                    return true;
                }
            }
        }
        else
        {
            $res = DB::select("SELECT roles.`slug` FROM roles JOIN roles_permissions
                                    ON roles.`id` = roles_permissions.`role_id`
                                    JOIN permissions ON roles_permissions.`permission_id` = permissions.`id`
                                    JOIN users_permissions ON permissions.`id` = users_permissions.`permission_id`
                                    JOIN users ON users.`id` = users_permissions.`user_id`
                                    WHERE users.`id` = :id and
                                    roles.`slug` = :roles" , ['id' => Auth::user()->getAuthIdentifier(), 'roles' => strval($roles)]);
            if($res[0]->slug = strval($roles))
            {
                return true;
            }
        }
        return false;
    }
}
