<?php
namespace App\Repositories;

use App\Models\Providers;
use PDO;
use VentasDimeca\Database\DbProvider;

class ProvidersRepository{

    private $_db;

    public function __construct()
    {
        $this->_db= DbProvider::get();
    }

    public function findAll(): Array {

        $result=[];

        $query = $this->_db->prepare('SELECT * FROM providers');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\Providers');

        return $result;

    }

    public function find(int $id): ?Providers{

        $result=null;

        $query = $this->_db->prepare('SELECT * FROM providers WHERE id = :id');
            $query->bindParam(':id',$id);
            $query->execute();

            $data= $query->fetchObject('App\Models\Providers');

            if ($data) {
                $result=$data;
            }

        return $result;

    }

    public function add(Providers $model) :void  {

        $now = date('Y-m-d H:i:s');

        $query = $this->_db->prepare('INSERT INTO providers(name,phone,dni,id_user,create_at,edited_at) VALUES(:name,:phone,:dni,:id_user,:create_at,:edited_at)');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':phone',$model->phone);
        $query->bindParam(':dni',$model->dni);
        $query->bindParam(':id_user',$model->id_user);
        $query->bindParam(':create_at',$now);
        $query->bindParam(':edited_at',$now);
        $query->execute();
}

public function update(Providers $model) :void  {

        $now = date('Y-m-d H:i:s');
        $query = $this->_db->prepare('UPDATE providers SET name=:name, phone=:phone, dni=:dni, edited_at=:edited_at WHERE id=:id ');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':phone',$model->phone);
        $query->bindParam(':dni',$model->dni);
        $query->bindParam(':edited_at',$now);
        $query->bindParam(':id',$model->id);
        $query->execute();

}

public function delete(int $id) :void  {
    
        $query = $this->_db->prepare('DELETE FROM providers WHERE id=:id ');  
        $query->bindParam(':id',$id);
        $query->execute();

}

}