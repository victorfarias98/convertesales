<?php

namespace App\Repositories\Contracts;

interface SaleRepositoryInterface
{
    public function index();
    public function getAllSalesData();
    public function saleByArea(string $area_id);
    public function salesByUnit(string $unit_id);
    public function userSales(): array;
    public function salesBetweenDates($start_date , $end_date): array;
    public function saleDetails(string $id): array;
    public function getSalesOfOwnUnit(): array;
    public function getSalesOfOwnArea(): array;
    public function getSumOfSalesOfAllAreas(): array;
    public function getSumOfSalesOfOwnArea(): array;
    public function show(string $id);
    public function store(array $data);
    public function update(string $id, array $data);
    public function delete($id);
}
