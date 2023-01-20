<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'title'=> 'Centro-oeste'
            ],
            [
                'title'=> 'Sudeste'
            ],
            [
                'title'=> 'Sul'
            ],
        ];
        foreach ($areas as $area) {
            Area::create($area);
        }
    }
}
