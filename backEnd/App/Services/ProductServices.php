<?php
namespace App\Services;

use App\Models\Product;
use PDOException;
use App\Repositories\ProductRepository;



class ProductServices{

    private $_Repos;

    public function __construct()
    {
        $this->_Repos = new  ProductRepository;
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

    public function getById(int $id): ?Product  {

        $result = null;

        try {
            $result = $this->_Repos->find($id);
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $result;

    }

    public function add(Product $model) :void  {
        try {
            $this->_Repos->add($model);
            echo 'producto creado exitosamente';
            
        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function update(Product $model) :void  {

        try {
            $this->_Repos->update($model);
            echo 'producto actualizado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function delete(int $id) :void  {

        try {
            $this->_Repos->delete($id);
            echo 'producto eliminado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

}