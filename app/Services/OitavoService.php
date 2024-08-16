<?php

namespace App\Services;

use App\Repositories\OitavoRepositoryInterface;
use App\Models\Oitavo;

class OitavoService {
    public function __construct (
        protected OitavoRepositoryInterface $OitavoRepository
    ){

    }

    public function getAll(){
        return $this->OitavoRepository->getAll();
    }

    public function store($data){
        return $this->OitavoRepository->store($data);
    }

    public function update($data, $id){
        return $this->OitavoRepository->update($data, $id);
    }

    public function delete($id){
        return $this->OitavoRepository->destroy($id);
    }
    
}
