<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        $this->createPermissions();
        $this->createGeneralDirectorRole();
        $this->createDirectorRole();
        $this->createManagerRole();
        $this->createSellerRole();
    }

    private function createPermissions()
    {
        Permission::create(['name' => 'view all areas']);
        Permission::create(['name' => 'create area']);
        Permission::create(['name' => 'update area']);
        Permission::create(['name' => 'delete areas']);
        Permission::create(['name' => 'assign area to a user']);
        Permission::create(['name' => 'view all units']);
        Permission::create(['name' => 'view all units of own area']);
        Permission::create(['name' => 'create unit']);
        Permission::create(['name' => 'update unit']);
        Permission::create(['name' => 'delete unit']);
        Permission::create(['name' => 'create unit for own area']);
        Permission::create(['name' => 'update unit for own area']);
        Permission::create(['name' => 'delete unit for own area']);
        Permission::create(['name' => 'view all users']);
        Permission::create(['name' => 'view all users of all units of own area']);
        Permission::create(['name' => 'view all users of own unit']);
        Permission::create(['name' => 'create user for all units']);
        Permission::create(['name' => 'create user for a unit of own area']);
        Permission::create(['name' => 'update user for a unit of own area']);
        Permission::create(['name' => 'delete user for a unit of own area']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'create user for own unit']);
        Permission::create(['name' => 'update user of own unit']);
        Permission::create(['name' => 'delete user of own unit']);
        Permission::create(['name' => 'view all sales']);
        Permission::create(['name' => 'view all sales by all sellers']);
        Permission::create(['name' => 'view all sales of all units of own area']);
        Permission::create(['name' => 'update sale of a seller of all units of own area']);
        Permission::create(['name' => 'delete sale of a seller of all units of own area']);
        Permission::create(['name' => 'view all sales of own unit']);
        Permission::create(['name' => 'update sale of a seller of own unit']);
        Permission::create(['name' => 'delete sale of a seller of own unit']);
        Permission::create(['name' => 'create sale']);
        Permission::create(['name' => 'view all own sales']);
        Permission::create(['name' => 'update own sale']);
        Permission::create(['name' => 'delete own sale']);
        Permission::create(['name' => 'filter sale by seller of all units of own area']);
        Permission::create(['name' => 'filter sale by seller of own unit']);
        Permission::create(['name' => 'filter sale by unit of own area']);
        Permission::create(['name' => 'filter own sale by dates']);
        Permission::create(['name' => 'get sum of sales of all areas']);
        Permission::create(['name' => 'get sum of sales by unit of all areas']);
        Permission::create(['name' => 'get sum of sales by all units of own area']);
        Permission::create(['name' => 'get sum of sales by own unit']);
        Permission::create(['name' => 'get sum of own sales']);
    }

    private function createGeneralDirectorRole()
    {
        Role::create(['name' => 'general-director'])->givePermissionTo(Permission::all());
    }

    private function createDirectorRole()
    {
        Role::create(['name' => 'director'])->givePermissionTo([
            'view all units of own area',
            'create unit for own area',
            'update unit for own area',
            'delete unit for own area',
            'view all users of all units of own area',
            'create user for a unit of own area',
            'update user for a unit of own area',
            'delete user for a unit of own area',
            'view all sales of all units of own area',
            'filter sale by seller of all units of own area',
            'filter sale by unit of own area',
            'get sum of sales by all units of own area'
        ]);
    }

    private function createManagerRole()
    {
        Role::create(['name' => 'manager'])->givePermissionTo([
            'view all users of own unit',
            'create user for own unit',
            'update user of own unit',
            'delete user of own unit',
            'view all sales of own unit',
            'filter sale by seller of own unit',
            'get sum of sales by own unit'
        ]);
    }

    private function createSellerRole()
    {
        Role::create(['name' => 'seller'])->givePermissionTo([
            'view all own sales',
            'update own sale',
            'delete own sale',
            'filter own sale by dates',
            'get sum of own sales'
        ]);
    }
}
