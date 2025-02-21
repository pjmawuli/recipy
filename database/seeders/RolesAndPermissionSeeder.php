<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // our permissions
        $permissions = [
            'recipe.view',
            'recipe.create',
            'recipe.update',
            'recipe.delete'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // the Admin gets all the permissions and can edit any recipe
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->syncPermissions($permissions);

        // the Editor is only allowed to create, update, delete, and view recipes
        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->syncPermissions(['recipe.view', 'recipe.create', 'recipe.update', 'recipe.delete']);

        // the User is only allowed to view
        $user = Role::firstOrCreate(['name' => 'User']);
        $user->syncPermissions(['recipe.view']);
    }
}
