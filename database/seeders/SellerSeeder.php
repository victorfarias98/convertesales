<?php

namespace Database\Seeders;

use App\Models\Unit;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $unitsIds = [
           'Porto Alegre' => $this->unitIdByName('Porto Alegre'),
           'Florianópolis' => $this->unitIdByName('Florianopolis'),
           'Curitiba' => $this->unitIdByName('Curitiba'),
           'Sao Paulo' => $this->unitIdByName('Sao Paulo'),
           'Rio de Janeiro' => $this->unitIdByName('Rio de Janeiro'),
           'Belo Horizonte' => $this->unitIdByName('Belo Horizonte'),
           'Vitória' => $this->unitIdByName('Vitória'),
           'Campo Grande' => $this->unitIdByName('Campo Grande'),
           'Goiania' => $this->unitIdByName('Goiania'),
           'Cuiabá' => $this->unitIdByName('Cuiabá')
        ];
       $users = UserFactory::getSellerUsers($unitsIds);
        foreach ($users as $user) {
            $seller = User::create($user);
            $seller->assignRole('seller');
        }
    }

    public function unitIdByName($name)
    {
        return Unit::where('title', $name)->first()->id;
    }
}
