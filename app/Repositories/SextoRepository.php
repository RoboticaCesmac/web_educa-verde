<?php

namespace App\Repositories;
use App\Models\Sexto;

class SextoRepository implements SextoRepositoryInterface {
    public function getAll(){
        return Sexto::query()->get();
    }

    public function store(array $data){
        $sexto = Sexto::create($data);

        return $sexto;
    }

    public function update(array $data, $id){
        $sexto = Sexto::findOrFail($id);
        $sexto->update($data);

        return $sexto;
    }

    public function destroy($id){
        $sexto = Sexto::findOrFail($id);
        $sexto->delete();
    }
}