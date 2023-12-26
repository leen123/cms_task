<?php

namespace App\Models\Admin;

use App\Enums\UserTypes;

use App\Models\User;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;

class Role extends \Spatie\Permission\Models\Role
{
    
    use HasFactory;
   

    protected $hidden = ['created_at', 'updated_at', 'guard_name', 'team_id'];
    public function user()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    public function hasPermission(string $permission)
    {
    
        return $this->permissions()->where('name',$permission)->count()>0;
    }


}
