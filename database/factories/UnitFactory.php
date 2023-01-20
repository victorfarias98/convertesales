<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

    }

    public static function getDefaultUnits($southArea, $centerArea, $southeastArea): array
    {
        return [
            [
                'title'=> 'Porto Alegre',
                'latitude' => '-30.048750057541955',
                'longitude' => '-51.228587422990806',
                'area_id' => $southArea
            ],
            [
                'title'=> 'Florianópolis',
                'latitude' => '-27.55393525017396',
                'longitude' => '-48.49841515885026',
                'area_id' => $southArea
            ],
            [
                'title'=> 'Curitiba',
                'latitude' => '-25.473704465731746',
                'longitude' => '-49.24787198992874',
                'area_id' => $southArea
            ],
            [
                'title'=> 'Sao Paulo',
                'latitude' => '-23.544259437612844',
                'longitude' => '-46.64370714029131',
                'area_id' => $southeastArea
            ],
            [
                'title'=> 'Rio de Janeiro',
                'latitude' => '-22.923447510604802',
                'longitude' => '-43.23208495438858',
                'area_id' => $southeastArea
            ],
            [
                'title'=> 'Belo Horizonte',
                'latitude' => '-19.917854829716372',
                'longitude' => '-43.94089385954766',
                'area_id' => $southeastArea
            ],
            [
                'title'=> 'Vitória',
                'latitude' => '-20.340992420772206',
                'longitude' => '-40.38332271475097',
                'area_id' => $southeastArea
            ],
            [
                'title'=> 'Campo Grande',
                'latitude' => '-20.462652006300377',
                'longitude' => '-54.615658937666645',
                'area_id' => $centerArea
            ],
            [
                'title'=> 'Goiania',
                'latitude' => '-16.673126240814387',
                'longitude' => '-49.25248826354209',
                'area_id' => $centerArea
            ],
            [
                'title'=> 'Cuiabá',
                'latitude' => '-15.601754458320842',
                'longitude' => '-56.09832706558089',
                'area_id' => $centerArea
            ],
        ];
    }
}
