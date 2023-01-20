<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'seller']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'director']);
        Role::create(['name' => 'general-director']);
    }
}
