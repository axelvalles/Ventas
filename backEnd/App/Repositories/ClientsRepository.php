<?php

namespace App\Repositories;

use App\Models\Clients;
use PDO;
use VentasDimeca\Database\DbProvider;
use PDOException;

class ClientsRepository{

    private $_db;

    public function __construct()
    {
        $this->_db = DbProvider::get();
    }

    public function findAll(): Array {

        $result=[];
        try{
        $query = $this->_db->prepare('SELECT * FROM clients');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\Clients');
        }catch(PDOException $e){
            $result = [];
        }
        return $result;

    }

    public function find(int $id): ?Clients{

        $result=null;

        $query = $this->_db->prepare('SELECT * FROM clients WHERE id = :id');
            $query->bindParam(':id',$id);
            $query->execute();

            $data= $query->fetchObject('App\Models\Clients');

            if ($data) {
                $result=$data;
            }

        return $result;

    }

    public function add(Clients $model) :?string  {

        $now = date('Y-m-d H:i:s');
        $result=null;
        try {
        $query = $this->_db->prepare('INSERT INTO clients(name,phone,dni,id_user,create_at,edited_at) VALUES(:name,:phone,:dni,:id_user,:create_at,:edited_at)');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':phone',$model->phone);
        $query->bindParam(':dni',$model->dni);
        $query->bindParam(':id_user',$model->id_user);
        $query->bindParam(':create_at',$now);
        $query->bindParam(':edited_at',$now);
        $query->execute();
        $result='ok';
        } catch (\PDOException $e) {
            $result= null;
        }

        return $result;

}

public function update(Clients $model) :?string  {
    try {
        $now = date('Y-m-d H:i:s');
        $query = $this->_db->prepare('UPDATE clients SET name=:name, phone=:phone,dni=:dni, edited_at=:edited_at WHERE id=:id ');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':phone',$model->phone);
        $query->bindParam(':dni',$model->dni);
        $query->bindParam(':edited_at',$now);
        $query->bindParam(':id',$model->id);
        $query->execute();
        $result='ok';
    } catch (\PDOException $e) {
        $result= null;
    }
    return $result;

}

public function delete(int $id) :?string  {
    $result = null;
    try {
        $query = $this->_db->prepare('DELETE FROM clients WHERE id=:id ');  
        $query->bindParam(':id',$id);
        $query->execute();
    } catch (\PDOException $e) {
        $result=null;
    }
    return $result;

}

}