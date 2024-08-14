<?php

namespace App\Services;

use App\Repositories\SextoRepositoryInterface;
use App\Models\Sexto;

class SextoService {
    public function __construct (
        protected SextoRepositoryInterface $SextoRepository
    ){

    }

    public function getAll(){
        return $this->SextoRepository->getAll();
    }

    public function store($data){
        return $this->SextoRepository->store($data);
    }

    public function update($data, $id){
        return $this->SextoRepository->update($data, $id);
    }

    public function delete($id){
        return $this->SextoRepository->destroy($id);
    }
    
}
