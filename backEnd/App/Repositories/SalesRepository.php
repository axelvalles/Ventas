<?php

namespace App\Repositories;

use App\Models\Sales;
use App\Models\SaleHeader;
use VentasDimeca\Database\DbProvider;
use PDOException;
use PDO;

class SalesRepository{

    private $_db;

    public function __construct()
    {
        $this->_db= DbProvider::get();
    }


    public function Add(Sales $model) :?string{
        $result = null;
        try{
            $now = date('Y-m-d H:i:s');
            $query = $this->_db->prepare('INSERT INTO sales
            (id_client,id_product,id_user,price_by_unit,cand,total,sale_number,create_at,edited_at) 
            VALUES(:id_client,:id_product,:id_user,:price_by_unit,:cand,:total,:sale_number,:create_at,:edited_at)');
            $query->bindParam(':id_client',$model->id_client);
            $query->bindParam(':id_product',$model->id_product);
            $query->bindParam(':id_user',$model->id_user);
            $query->bindParam(':price_by_unit',$model->price_by_unit);
            $query->bindParam(':cand',$model->cand);
            $query->bindParam(':total',$model->total);
            $query->bindParam(':sale_number',$model->sale_number);
            $query->bindParam(':create_at',$now);
            $query->bindParam(':edited_at',$now);
            $query->execute();
            $result='ok';
        }catch(PDOException $e){
            $result = $e;
        }


        return $result;

    }

    public function AddHeader(SaleHeader $model) :?string{
        $result = null;
        try{
            $now = date('Y-m-d H:i:s');
            $query = $this->_db->prepare('INSERT INTO salesheader (id_client, id_user, total, sale_number, create_at, edited_at) 
            VALUES (:id_client,:id_user,:total,:sale_number,:create_at,:edited_at)');
            $query->bindParam(':id_client',$model->id_client);
            $query->bindParam(':id_user',$model->id_user);
            $query->bindParam(':total',$model->total);
            $query->bindParam(':sale_number',$model->sale_number);
            $query->bindParam(':create_at',$now);
            $query->bindParam(':edited_at',$now);
            $query->execute();
            $result='HeaderCreado';
        }catch(PDOException $e){
            $result = $e;
        }

        return $result;
    }

    public function findHeader(): Array {

        try {
            $query = $this->_db->prepare('SELECT s.sale_number, (u.name) as user, (c.name) as client, c.dni, s.total , s.create_at
            FROM salesheader as s 
            INNER JOIN clients as c
                ON s.id_client = c.id
            INNER JOIN users as u
                ON s.id_user = u.id
            ORDER BY s.sale_number DESC');
            $query->execute();
            $result = $query->fetchAll();
        } catch (\Throwable $th) {
            $result=[];
        }
        return $result;
    }

    public function getSaleNumber() {
        $result = null;
        try{
        $query = $this->_db->prepare('SELECT sale_number FROM sales WHERE sale_number = (SELECT MAX(sale_number) FROM sales)');
        $query->execute();
        $data= $query->fetchAll();
        $result = $data;
        }catch(PDOException $e){
            $result = null;
        }
        return $result;
    }
}

