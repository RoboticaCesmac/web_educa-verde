<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSextoRequest;
use App\Http\Requests\UpdateSextoRequest;
use App\Models\Sexto;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\SextoService;
use App\DTO\sextoDto;

class SextoController extends Controller
{
    protected $sextoService;

    public function __construct(SextoService $sextoService){
        $this->sextoService = $sextoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sexto = $this->sextoService->getAll();

        return response()->json($sexto);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSextoRequest $request)
    {
        try {
            $sextoDTO = SextoDTO::fromRequest($request->validated());
            $sexto = $this->sextoService->store($sextoDTO);

            return response()->json($sexto);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao cadastrar conteúdo!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sexto $sexto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sexto $sexto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSextoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $sexto = $this->sextoService->update($data, $id);

            return response()->json($sexto);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao atualizar conteúdo!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->sextoService->delete($id);

            return response()->json(['msg' => 'Conteúdo excluído com sucesso!']);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao excluir conteúdo!']);
        }
    }
}
