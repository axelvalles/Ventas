<?php
namespace App\Services;

use App\Models\Providers;
use App\Repositories\ProvidersRepository;
use PDOException;

class ProvidersServices{

    private $_Repos;

    public function __construct()
    {
        $this->_Repos = new  ProvidersRepository;
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

    public function getById(int $id): ?Providers  {

        $result = null;

        try {
            $result = $this->_Repos->find($id);
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $result;

    }

    public function add(Providers $model) :string  {
        $result='';
        try {
            $this->_Repos->add($model);
            $result= 'ok';
            
        } catch (PDOException $ex) {
            $result= 'error';
        }
        return $result;
    }

    public function update(Providers $model) :void  {

        try {
            $this->_Repos->update($model);
            echo 'provider actualizado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function delete(int $id) :void  {

        try {
            $this->_Repos->delete($id);
            echo 'provider eliminado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }
}
