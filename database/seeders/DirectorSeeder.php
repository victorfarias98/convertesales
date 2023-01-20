<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = UserFactory::getDirectorUsers();
        foreach ($users as $user) {
            $director = User::create($user);
            $director->assignRole('director');
        }
    }
}
