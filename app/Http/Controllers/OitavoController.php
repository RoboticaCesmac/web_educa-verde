<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOitavoRequest;
use App\Http\Requests\UpdateOitavoRequest;
use App\Models\Oitavo;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Services\OitavoService;
use App\DTO\oitavoDto;

class OitavoController extends Controller
{
    protected $oitavoService;

    public function __construct(OitavoService $oitavoService){
        $this->oitavoService = $oitavoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oitavo = $this->oitavoService->getAll();
        
        return response()->json($oitavo);
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
    public function store(StoreOitavoRequest $request)
    {
        try {
            $oitavoDTO = OitavoDTO::fromRequest($request->validated());
            $oitavo = $this->oitavoService->store($oitavoDTO);

            return response()->json($oitavo);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao cadastrar conteúdo!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Oitavo $oitavo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oitavo $oitavo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOitavoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $oitavo = $this->oitavoService->update($data, $id);

            return response()->json($oitavo);
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
            $this->oitavoService->delete($id);

            return response()->json(['msg' => 'Conteúdo excluído com sucesso!']);
        } catch(Exception $e) {
            return response()->json(['msg' => 'Erro ao excluir conteúdo!']);
        }
    }
}
