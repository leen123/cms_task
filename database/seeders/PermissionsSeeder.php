<?php

namespace Database\Seeders;

use App\Models\Permission\PermissionGroup;
use App\Models\Provider\AccountTypes;
use App\Models\Trainer\TrainerTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->permissions();

    }
  
    private function permissions()
    {
       // $groups = json_decode(file_get_contents('http://127.0.0.1:8000/json/permissions.json'));
        $groups = json_decode(file_get_contents(asset('json/permissions.json')));
        foreach ($groups as $groupName => $group) {

            foreach ($group as $permission) {
                $createdPermission = Permission::create(['name' => $permission, 'guard_name' => $groupName]);
            }
        }
    }
}
