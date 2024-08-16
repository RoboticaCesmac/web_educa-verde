<?php

namespace App\Repositories;
use App\Models\Setimo;

class SetimoRepository implements SetimoRepositoryInterface {
    public function getAll(){
        return Setimo::query()->get();
    }

    public function store(array $data){
        $setimo = Setimo::create($data);

        return $setimo;
    }

    public function update(array $data, $id){
        $setimo = Setimo::findOrFail($id);
        $setimo->update($data);

        return $setimo;
    }

    public function destroy($id){
        $setimo = Setimo::findOrFail($id);
        $setimo->delete();
    }
}