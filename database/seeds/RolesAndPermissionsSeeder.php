<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        // create roles and assign created permissions

        // or may be done by this can be done as chaining
        $role = Role::create(['name' => 'Admin'])
            ->givePermissionTo(['create', 'read', 'update']);

        // or may be done by separate statements
        $role = Role::create(['name' => 'Employee']);
        $role->givePermissionTo('read');
    }
}
