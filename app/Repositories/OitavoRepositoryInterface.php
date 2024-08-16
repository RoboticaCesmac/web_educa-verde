<?php 

namespace App\Repositories;

interface OitavoRepositoryInterface {
    public function getAll();

    public function store(array $data);

    public function update(array $data, $id);

    public function destroy($id);
}