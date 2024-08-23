<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSetimoRequest;
use App\Http\Requests\UpdateSetimoRequest;
use App\Models\Setimo;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\SetimoService;
use App\DTO\setimoDto;

class SetimoController extends Controller
{
    protected $setimoService;

    public function __construct(SetimoService $setimoService){
        $this->setimoService = $setimoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setimo = $this->setimoService->getAll();
        
        return response()->json($setimo);
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
    public function store(StoreSetimoRequest $request)
    {
        try {
            $setimoDTO = SetimoDTO::fromRequest($request->validated());
            $setimo = $this->setimoService->store($setimoDTO);

            return response()->json($setimo);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao cadastrar conteúdo!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Setimo $setimo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setimo $setimo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSetimoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $setimo = $this->setimoService->update($data, $id);

            return response()->json($setimo);
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
            $this->setimoService->delete($id);

            return response()->json(['msg' => 'Conteúdo excluído com sucesso!']);
        } catch(Exception $e) {
            return response()->json(['msg' => 'Erro ao excluir conteúdo!']);
        }
    }
}
