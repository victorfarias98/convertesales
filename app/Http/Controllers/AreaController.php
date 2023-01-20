<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Repositories\Contracts\AreaRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AreaController extends Controller
{
    private AreaRepositoryInterface $areaRepository;

    public function __construct(AreaRepositoryInterface $areaRepository)
    {
        $this->areaRepository = $areaRepository;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $response = $this->areaRepository->index();
        if(isset($response['erro'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['mensagem'])) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAreaRequest $request
     * @return JsonResponse
     */
    public function store(StoreAreaRequest $request): JsonResponse
    {
        $sale = $request->validated();
        $response = $this->areaRepository->store($sale);
        if(isset($response['erro'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $response = $this->areaRepository->show($id);
        if(isset($response['erro'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        if(isset($response['mensagem']) ) {
            return response()->json($response, ResponseAlias::HTTP_NOT_FOUND);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAreaRequest $request
     * @param Area $area
     * @return JsonResponse
     */
    public function update(UpdateAreaRequest $request, Area $area): JsonResponse
    {
        $response = $this->areaRepository->update($area->id, $request->validated());
        if(isset($response['erro'])) {
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $response = $this->areaRepository->delete($id);
        if(isset($response['erro'])){
            return response()->json($response, ResponseAlias::HTTP_BAD_REQUEST);
        }
        return response()->json($response, ResponseAlias::HTTP_OK);
    }
}
