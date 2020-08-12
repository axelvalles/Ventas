<?php
namespace App\Repositories;

use App\Models\Product;
use VentasDimeca\Database\DbProvider;
use PDO;
use PDOException;

class ProductRepository{

    private $_db;

    public function __construct()
    {
        $this->_db = DbProvider::get();
    }

    public function findAll(): Array {

        $result=[];
        try{
            $query = $this->_db->prepare('SELECT * FROM products');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
        }catch(PDOException $e){
            $result = [];
        }

        return $result;

    }

    public function find(int $id) : ?Product {

        $result = null;

            $query = $this->_db->prepare('SELECT * FROM products WHERE id = :id');
            $query->bindParam(':id',$id);
            $query->execute();

            $data= $query->fetchObject('App\Models\Product');

            if ($data) {
                $result=$data;
            }

        return $result;

    }

    public function add(Product $model) :void  {

            $now = date('Y-m-d H:i:s');

            $query = $this->_db->prepare('INSERT INTO products(code,description,price,id_user,id_provider,create_at,edited_at) VALUES(:code,:description,:price,:id_user,:id_provider,:create_at,:edited_at)');
            $query->bindParam(':code',$model->code);
            $query->bindParam(':description',$model->description);
            $query->bindParam(':price',$model->price);
            $query->bindParam(':id_user',$model->id_user);
            $query->bindParam(':id_provider',$model->id_provider);
            $query->bindParam(':create_at',$now);
            $query->bindParam(':edited_at',$now);
            $query->execute();

    }

    public function update(Product $model) :void  {

            $now = date('Y-m-d H:i:s');
            $query = $this->_db->prepare('UPDATE products SET code=:code,description=:description, price=:price, edited_at=:edited_at WHERE id=:id ');
            $query->bindParam(':code',$model->code);
            $query->bindParam(':description',$model->description);
            $query->bindParam(':price',$model->price);
            $query->bindParam(':edited_at',$now);
            $query->bindParam(':id',$model->id);
            $query->execute();

    }

    public function delete(int $id) :void  {
        
            $query = $this->_db->prepare('DELETE FROM products WHERE id=:id ');  
            $query->bindParam(':id',$id);
            $query->execute();

    }
}