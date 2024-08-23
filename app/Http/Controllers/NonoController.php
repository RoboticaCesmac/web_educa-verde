<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNonoRequest;
use App\Http\Requests\UpdateNonoRequest;
use App\Models\Nono;
use Illuminate\Support\Facades\Log;
use App\Services\NonoService;
use App\DTO\nonoDto;
use Exception;


class NonoController extends Controller
{
    protected $nonoService;

    public function __construct(NonoService $nonoService){
        $this->nonoService = $nonoService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nono = $this->nonoService->getAll();
        
        return response()->json($nono);
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
    public function store(StoreNonoRequest $request)
    {
        try {
            $nonoDTO = NonoDTO::fromRequest($request->validated());
            $nono = $this->nonoService->store($nonoDTO);

            return response()->json($nono);
        }catch(Exception $e){
            return response()->json(['msg' => 'Erro ao cadastrar conteúdo!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nono $nono)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nono $nono)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNonoRequest $request, int $id)
    {
        try {
            $data = $request->validated();
            $nono = $this->nonoService->update($data, $id);

            return response()->json($nono);
        }catch(Exception $e) {
            return response()->json(['msg' => 'Erro ao atualizar conteúdo!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->nonoService->delete($id);

            return response()->json(['msg' => 'Conteúdo excluído com sucesso!']);
        } catch(Exception $e) {
            return response()->json(['msg' => 'Erro ao excluir conteúdo!']);
        }
    }
}
