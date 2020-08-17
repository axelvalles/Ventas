<?php

namespace App\Repositories;

use App\Models\Sales;
use PDO;
use VentasDimeca\Database\DbProvider;
use PDOException;

class SalesRepository{

    private $db;

    public function __construct()
    {
        $this->db = DbProvider::get();
    }

    public function Add(Sales $model) :?string{
        $result = null;
        try{
            $now = date('Y-m-d H:i:s');
            $query = $this->_db->prepare('INSERT INTO sales
            (id_client,id_product,id_user,price_by_unit,total,sale_number,create_at,edited_at) 
            VALUES(:id_client,:id_product,:id_user,:price_by_unit,:total,:sale_number,:create_at,:edited_at)');
            $query->bindParam(':id_client',$model->id_client);
            $query->bindParam(':id_product',$model->id_product);
            $query->bindParam(':id_user',$model->id_user);
            $query->bindParam(':price_by_unit',$model->price_by_unit);
            $query->bindParam(':total',$model->total);
            $query->bindParam(':sale_number',$model->sale_number);
            $query->bindParam(':create_at',$now);
            $query->bindParam(':edited_at',$now);
            $query->execute();
            $result='ok';
        }catch(PDOException $e){
            $result = null;
        }


        return $result;

    }
}