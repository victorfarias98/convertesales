<?php

namespace App\Repositories;

use App\Models\Sale;
use App\Repositories\Contracts\SaleRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleRepository implements SaleRepositoryInterface
{
    private Sale $model;

    public function __construct(Sale $model)
    {
        $this->model = $model;
    }

    public function index(): array
    {
        try {
            $sales = $this->model::with('user')->get(
                ['value', 'latitude', 'longitude', 'created' , 'user_id']
            );
            if($sales->count() == 0){
                return ['message' => 'Nenhuma venda encontrada no sistema'];
            }
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar sales', 'error' => $exception->getMessage()];
        }
    }

    public function getAllSalesData(): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->leftJoin('areas', 'units.area_id','=','areas.id')
                ->select('sales.*')
                ->get();
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }

    public function saleByArea(string $area_id): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->leftJoin('areas', 'units.area_id','=','areas.id')
                ->select('sales.*')
                ->where('areas.id','=', $area_id)
                ->get();
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }

    public function salesByUnit(string $unit_id): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->select('sales.*')
                ->where('units.id','=', $unit_id)
                ->get();
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }

    public function show(string $id): array
    {
        try {
            $sale = $this->model::where('id',$id)->with('user')->get(
                ['value', 'latitude', 'longitude', 'created' , 'user_id']
            );
            if($sale->count() == 0){
                return ['message' => 'Venda não encontrada'];
            }
            return ['sale' => $sale];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar venda', 'error' => $exception->getMessage()];
        }

    }

    public function store(array $data): array
    {
        try {
            $this->model->setRawAttributes($data);
            if($this->model->save()){
                return [
                    'message' => 'Sucesso ao cadastrar venda',
                    'sale' => $this->model
                ];
            }
        } catch (QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao cadastrar venda', 'error' => $exception->getMessage()];
        }
        return ['message' => 'Erro ao cadastrar venda', 'error' => 'Erro desconhecido'];
    }

    public function update(string $id, array $data): array
    {
        try {
            $this->model->setRawAttributes($data);
            if($this->model->save()){
                return [
                    'message' => 'Sucesso ao editar venda',
                    'sale' => $this->model
                ];
            }
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao editar venda', 'error' => $exception->getMessage()];
        }
    }

    public function delete($id): array
    {
        try {
            $this->model::destroy($id);
            return ['message' => 'Venda deletada com sucesso'] ;
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao deletar venda', 'error' => $exception->getMessage()];
        }
    }

    public function userSales(): array
    {
        try {
            $sales = $this->model::where('user_id', Auth::id())->simplePaginate(20);
            if(!isset($sales['data'])){
                return ['message' => 'Esse usuário não possui sales'];
            }
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Esse usuário não possui sales', 'error' => $exception->getMessage()];
        }
    }

    public function salesBetweenDates($start_date , $end_date): array
    {
        try {
            $sales = $this->model::select("*")->where('user_id', Auth::id())->whereBetween('created', [$start_date, $end_date])->get();
            if($sales->count() == 0){
                return ['message' => 'Nenhuma venda encontrada nesse período'];
            }
            return ['total' => $sales->count(),'sales' => $sales];
        } catch (QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao recuperar vendas', 'error' => $exception->getMessage()];
        }
    }

    public function saleDetails(string $id): array
    {
        try {
            $sale = $this->model::where('id',$id)->with('user')->get(
                ['value', 'latitude', 'longitude', 'created' , 'user_id']
            );
            if($sale->count() == 0 || ( Auth::user()->hasRole('seller') && $sale->user_id !== Auth::id())){
                return ['message' => 'Venda não encontrada'];
            }
            return ['sale' => $sale];
        }  catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar venda', 'error' => $exception->getMessage()];
        }
    }

    public function getSalesOfOwnUnit(): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->select('sales.*')
                ->where('users.id','=', Auth::id())
                ->get();
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }

    public function getSalesOfOwnArea(): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->leftJoin('areas', 'units.area_id','=','areas.id')
                ->select('sales.*')
                ->where('areas.user_id','=', Auth::id())
                ->get();
            return ['sales' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }
    public function getSumOfSalesOfAllAreas(): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->leftJoin('areas', 'units.area_id','=','areas.id')
                ->select('sales.*')
                ->sum('sales.value');
            return ['sum' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }
    public function getSumOfSalesOfOwnArea(): array
    {
        try {
            $sales = DB::table('sales')
                ->leftJoin('users', 'sales.user_id','=','users.id')
                ->leftJoin('units', 'users.unit_id','=','units.id')
                ->leftJoin('areas', 'units.area_id','=','areas.id')
                ->select('sales.*')
                ->sum('sales.value')
                ->where('areas.user_id','=', Auth::id());
            return ['sum' => $sales];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['message' => 'Erro ao retornar vendas', 'error' => $exception->getMessage()];
        }
    }

}
