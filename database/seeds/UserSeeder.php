<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User
        $user = User::create([
            'name' => 'Kautsar Al Bana',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ]);
        $role = Role::create(['name' => 'Superuser']);
        $role->givePermissionTo(Permission::all());
        $user->assignRole($role->id);
    }
}
