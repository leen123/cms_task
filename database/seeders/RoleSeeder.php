<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::query()->create([
            'guard_name' => \App\Enums\UserTypes::ADMIN->value,
            'name' =>"Super Admin"
        ]);
        $permissions = Permission::all();
        $role->permissions()->attach($permissions);
          

    }
}
