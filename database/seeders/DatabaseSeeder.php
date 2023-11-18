<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin_role = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('password')
        ]);
        $admin->assignRole($admin_role);

        $user_role = Role::create(['name' => 'user']);
        $user = User::create([
            'name'      => 'User', 
            'email'     => 'user@user.com',
            'password'  => bcrypt('password')
        ]);
        $user->assignRole($user_role);

        $permission = Permission::create(['name' => 'edit articles']);

        $admin_role->givePermissionTo($permission);

        // $permission->assignRole($admin_role);

    }
}
