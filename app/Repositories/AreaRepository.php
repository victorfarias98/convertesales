<?php

namespace App\Repositories;

use App\Models\Area;
use App\Repositories\Contracts\AreaRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class AreaRepository implements AreaRepositoryInterface
{
    private Area $model;
    public function __construct(Area $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try {
            $areas = $this->model::with('units')->get();
            if($areas->count() == 0){
                return ['mensagem' => 'Nenhuma área encontrada no sistema'];
            }
            return ['áreas' => $areas];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['mensagem' => 'Erro ao retornar áreas', 'error' => $exception->getMessage()];
        }
    }

    public function show(string $id)
    {
        try {
            $area = $this->model::where('id',$id)->with('units')->get(
                ['value', 'latitude', 'longitude', 'created' , 'user_id']
            );
            if($area->count() == 0){
                return ['mensagem' => 'Área não encontrada'];
            }
            return ['área' => $area];
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['mensagem' => 'Erro ao retornar área', 'error' => $exception->getMessage()];
        }
    }

    public function store(array $data)
    {
        try {
            $this->model->setRawAttributes($data);
            if($this->model->save()){
                return [
                    'mensagem' => 'Sucesso ao cadastrar venda',
                    'área' => $this->model
                ];
            }
        } catch (QueryException $exception){
            report($exception);
            return ['mensagem' => 'Erro ao cadastrar área', 'error' => $exception->getMessage()];
        }
        return ['mensagem' => 'Erro ao cadastrar área', 'error' => 'Erro desconhecido'];
    }

    public function update(string $id, array $data): array
    {
        try {
            $this->model->setRawAttributes($data);
            if($this->model->save()){
                return [
                    'mensagem' => 'Sucesso ao editar área',
                    'área' => $this->model
                ];
            }
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['mensagem' => 'Erro ao editar área', 'error' => $exception->getMessage()];
        }
    }

    public function delete($id): array
    {
        try {
            $this->model::destroy($id);
            return ['mensagem' => 'Área deletada com sucesso'] ;
        } catch (ModelNotFoundException | QueryException $exception){
            report($exception);
            return ['mensagem' => 'Erro ao deletar área', 'error' => $exception->getMessage()];
        }
    }

}
