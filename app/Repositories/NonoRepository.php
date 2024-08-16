<?php

namespace App\Repositories;
use App\Models\Nono;

class NonoRepository implements NonoRepositoryInterface {
    public function getAll(){
        return Nono::query()->get();
    }

    public function store(array $data){
        $nono = Nono::create($data);

        return $nono;
    }

    public function update(array $data, $id){
        $nono = Nono::findOrFail($id);
        $nono->update($data);

        return $nono;
    }

    public function destroy($id){
        $nono = Nono::findOrFail($id);
        $nono->delete();
    }
}