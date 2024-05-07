<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'delete-role']);
        Permission::create(['name' => 'read-role']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'read-user']);

        Role::create(['name' => 'super-admin'])->givePermissionTo(
            [
                'create-role', 
                'edit-role', 
                'delete-role', 
                'read-role',
                'create-user', 
                'edit-user', 
                'delete-user', 
                'read-user'
            ]
        );
        Role::create(['name' => 'admin'])->givePermissionTo(
            [
                'create-user', 
                'edit-user', 
                'delete-user', 
                'read-user'
            ]
        );

        Role::create(['name' => 'client'])->givePermissionTo([]);
        
    }
}
