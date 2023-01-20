<?php

namespace App\Services;

use App\Repositories\Contracts\UnitRepositoryInterface;
use Location\Coordinate;
use Location\Distance\Vincenty;

class RoamingService
{
    private UnitRepositoryInterface $unitRepository;
    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public static function verifySaleRoaming($latitude, $longitude) : bool
    {

        return true | false;
    }

    private function getUnits(): array
    {
        return $this->unitRepository->getUnitLocations();
    }

    public function minDistance($latitude, $longitude){
        $default_coordinate = new Coordinate($latitude, $longitude);
        $calculator = new Vincenty();
        $units = $this->getUnits();
        $unitDistances = [];
        foreach($units as $unit){
            $coordinate = new Coordinate($unit['latitude'], $unit['longitude']);
            $unitDistances[] = ['id' => $unit['id'], 'distance' => $calculator->getDistance($coordinate, $default_coordinate)];
        }
        $distance = [];
        foreach($unitDistances as $dis){
            $distance[] = $dis['distance'];
        }
        $minIndex =  array_search( min($distance) ,array_column($unitDistances,'distance'));
        return $unitDistances[$minIndex];
    }

}
