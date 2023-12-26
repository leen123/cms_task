<?php

namespace App\Http\Services;

use App\Enums\UserTypes;
use App\Models\Admin\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class EditorService
{
    public static function create(array $attributes)
    {
        $attributes['user_type']=UserTypes::EDITOR;
        $role= Role::query()->create([
            'guard_name' => UserTypes::EDITOR,
            'name' =>  $attributes['name']
        ]);
        $user =$role->user()->create($attributes)
                    ;
        return  $user ;
    }
    public  function updateRoleWithPermissions(array $attributes, Role $role): void
    {
        $addedPermissions = $attributes['new_permissions_ids'];
        $deletedPermissions = $attributes['deleted_permissions_ids'];


        
        
        $this->checkPermissionsExistence($addedPermissions);
        $this->checkPermissionsExists($role,$addedPermissions);

        if (!empty(array_intersect($addedPermissions, $deletedPermissions))) {
            abort(400, 'added permissions and deleted permission conflicts with some id');
        }
    
         $role->permissions()->attach($addedPermissions);
            $role->permissions()->detach ($deletedPermissions);
        
    }
    protected function checkPermissionsExistence(array $permissionsIds): void
    {
        
        $accountTypePermissionsCount =$this->getEditorPermission()->whereIn('permissions.id', $permissionsIds)->count();

        if ($accountTypePermissionsCount != count($permissionsIds)) {
            abort(400, 'one or more of permission ids do not match account type permissions');
        }

    }
    protected function checkPermissionsExists( Role $role,array $permissionsIds): void
    {
        
        $accountTypePermissionsCount =$role->permissions()->whereIn('permissions.id', $permissionsIds)->count();

        if ($accountTypePermissionsCount >0) {
            abort(400, 'one or more of permission ids already exists');
        }

    }
    public function getEditorPermission( )
    {
        return Permission::query()->where('guard_name','articles');
    }

}
