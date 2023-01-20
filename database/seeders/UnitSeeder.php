<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Unit;
use Database\Factories\UnitFactory;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $southArea = Area::where('title','Sul')->first()->id;
        $centerArea = Area::where('title','Centro-oeste')->first()->id;
        $southeastArea = Area::where('title','Sudeste')->first()->id;

        #$northArea = Area::where('title','Norte')->get();
        #$northeastArea = Area::where('title','Nordeste')->get();

        $units = UnitFactory::getDefaultUnits(southArea: $southArea, centerArea: $centerArea, southeastArea: $southeastArea);

        foreach ($units as $unit){
            Unit::create($unit);
        }
    }
}
