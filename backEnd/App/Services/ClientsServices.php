<?php

namespace App\Services;

use App\Repositories\ClientsRepository;
use PDOException;
use App\Models\Clients;

class ClientsServices{

    private $_Repos;

    public function __construct()
    {
        $this->_Repos = new ClientsRepository;
    }

    public function getAll() : array {

        $result=[];

        try {
            $result = $this->_Repos->findAll();
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $result;
    }

    public function getById(int $id): ?Clients  {

        $result = null;

        try {
            $result = $this->_Repos->find($id);
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $result;

    }

    public function add(Clients $model) :void  {
        try {
            $this->_Repos->add($model);
            echo 'cliente creado exitosamente';
            
        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function update(Clients $model) :void  {

        try {
            $this->_Repos->update($model);
            echo 'cliente actualizado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function delete(int $id) :void  {

        try {
            $this->_Repos->delete($id);
            echo 'cliente eliminado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

}