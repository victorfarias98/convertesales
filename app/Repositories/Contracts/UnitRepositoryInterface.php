<?php

namespace App\Repositories\Contracts;

interface UnitRepositoryInterface
{
    public function index();

    public function show(string $id);

    public function store(array $data);

    public function update(string $id, array $data);

    public function delete($id);

    public function getUnitLocations();
}

