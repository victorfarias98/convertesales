<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreaSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);

        $this->call(SellerSeeder::class);
        $this->call(ManagerSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(GeneralDirectorSeeder::class);

        $this->call(UpdateAreaSeeder::class);
    }
}
