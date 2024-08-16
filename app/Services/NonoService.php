<?php

namespace App\Services;

use App\Repositories\NonoRepositoryInterface;
use App\Models\Nono;

class NonoService {
    public function __construct (
        protected NonoRepositoryInterface $NonoRepository
    ){

    }

    public function getAll(){
        return $this->NonoRepository->getAll();
    }

    public function store($data){
        return $this->NonoRepository->store($data);
    }

    public function update($data, $id){
        return $this->NonoRepository->update($data, $id);
    }

    public function delete($id){
        return $this->NonoRepository->destroy($id);
    }
    
}
