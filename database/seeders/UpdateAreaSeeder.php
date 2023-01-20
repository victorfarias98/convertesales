<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use Illuminate\Database\Seeder;

class UpdateAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vagnerMancini = User::where('name', 'Vagner Mancini')->first()->id;
        $abelFerreira = User::where('name', 'Abel Ferreira')->first()->id;
        $rogerioCeni = User::where('name', 'Rogerio Ceni')->first()->id;
        Area::where('title','Sul')->update(['user_id' => $vagnerMancini]);
        Area::where('title','Sudeste')->update(['user_id' => $abelFerreira]);
        Area::where('title','Centro-oeste')->update(['user_id' => $rogerioCeni]);
    }
}
