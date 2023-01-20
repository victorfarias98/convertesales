<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class GeneralDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = UserFactory::getGeneralDirectorUsers();
        foreach ($users as $user) {
            $generalDirector = User::create($user);
            $generalDirector->assignRole('general-director');
        }
    }
}
