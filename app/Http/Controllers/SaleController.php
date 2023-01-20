<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Models\User;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\UnitRepositoryInterface;
use App\Services\RoamingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class SaleController extends Controller
{
    protected SaleRepositoryInterface $saleRepository;
    protected UnitRepositoryInterface $unitRepository;
    protected RoamingService $roamingService;

    public function __construct(SaleRepositoryInterface $saleRepository, UnitRepositoryInterface $unitRepository)
    {
        $this->saleRepository = $saleRepository;
        $this->unitRepository = $unitRepository;
        $this->roamingService = new RoamingService($this->unitRepository);

        $this->middleware('auth');
    }

    public function index(): JsonResponse
    {
        $response = $this->saleRepository->index();
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['message'])) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }


    public function getAllSalesData(): JsonResponse
    {
        $response = $this->saleRepository->getAllSalesData();
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['message'])) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function store(StoreSaleRequest $request): JsonResponse
    {
        $sale = $request->validated();
        $sale['roaming'] = $this->verifyRoaming($sale['latitude'], $sale['longitude'], $sale['user_id']);
        $response = $this->saleRepository->store($sale);
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_CREATED);
    }

    public function show(string $id): JsonResponse
    {
        $response = $this->saleRepository->show($id);
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['message']) ) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function saleDetails(string $id)
    {
        $response = $this->saleRepository->saleDetails($id);
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['message']) ) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function update(UpdateSaleRequest $request, Sale $sale): JsonResponse
    {
        $response = $this->saleRepository->update($sale->id, $request->validated());
        if(isset($response['error'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_CREATED);
    }

    public function destroy(Sale $sale): JsonResponse
    {
        $response = $this->saleRepository->delete($sale->id);
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function userSales(): JsonResponse
    {
        $response = $this->saleRepository->userSales();
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function salesBetweenDates(Request $request): JsonResponse
    {
        $response = $this->saleRepository->salesBetweenDates($request->start_date, $request->end_date);
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function salesByArea(Request $request): JsonResponse
    {
        $response = $this->saleRepository->saleByArea($request->area_id);
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function getSalesOfOwnUnit(Request $request): JsonResponse
    {
        $response = $this->saleRepository->getSalesOfOwnUnit();
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function getSalesOfOwnArea(Request $request): JsonResponse
    {
        $response = $this->saleRepository->getSalesOfOwnArea();
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function salesByUnit(Request $request): JsonResponse
    {
        $response = $this->saleRepository->salesByUnit($request->unit_id);
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function getSumOfSalesOfOwnArea(): JsonResponse
    {
        $response = $this->saleRepository->getSumOfSalesOfOwnArea();
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    public function getSumOfSalesOfAllAreas(): JsonResponse
    {
        $response = $this->saleRepository->getSumOfSalesOfAllAreas();
        if(isset($response['error'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    private function verifyRoaming($latitude, $longitude, string $user_id) : bool
    {
        $checkDistance =  $this->roamingService->minDistance($latitude, $longitude);
        $user = User::where('id', $user_id)->first();
        return $checkDistance['id'] !== $user->unit_id;
    }
}
