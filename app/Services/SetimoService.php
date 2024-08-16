<?php

namespace App\Services;

use App\Repositories\SetimoRepositoryInterface;
use App\Models\Setimo;

class SetimoService {
    public function __construct (
        protected SetimoRepositoryInterface $SetimoRepository
    ){

    }

    public function getAll(){
        return $this->SetimoRepository->getAll();
    }

    public function store($data){
        return $this->SetimoRepository->store($data);
    }

    public function update($data, $id){
        return $this->SetimoRepository->update($data, $id);
    }

    public function delete($id){
        return $this->SetimoRepository->destroy($id);
    }
    
}
