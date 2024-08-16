<?php

namespace App\Repositories;
use App\Models\Oitavo;

class OitavoRepository implements OitavoRepositoryInterface {
    public function getAll(){
        return Oitavo::query()->get();
    }

    public function store(array $data){
        $oitavo = Oitavo::create($data);

        return $oitavo;
    }

    public function update(array $data, $id){
        $oitavo = Oitavo::findOrFail($id);
        $oitavo->update($data);

        return $oitavo;
    }

    public function destroy($id){
        $oitavo = Oitavo::findOrFail($id);
        $oitavo->delete();
    }
}