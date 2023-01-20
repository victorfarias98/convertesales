<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\Contracts\UnitRepositoryInterface;

class UnitRepository implements UnitRepositoryInterface
{
    private Unit $model;
    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function show(string $id)
    {
        // TODO: Implement show() method.
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function update(string $id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getUnitLocations()
    {
        return $this->model::all(['id', 'title','latitude','longitude'])->toArray();
    }
}
