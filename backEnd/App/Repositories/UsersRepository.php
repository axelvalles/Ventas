<?php
namespace App\Repositories;

use PDO;
use App\Models\Users;
use VentasDimeca\Database\DbProvider;  

class UsersRepository{

    private $_db;

    public function __construct()
    {
        $this->_db = DbProvider::get();
    }

    public function findAll(): Array {

        $result=[];

        $query = $this->_db->prepare('SELECT * FROM users');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, 'App\Models\Users');

        return $result;

    }

    public function find(int $id): ?Users{

        $result=null;

        $query = $this->_db->prepare('SELECT * FROM users WHERE id = :id');
            $query->bindParam(':id',$id);
            $query->execute();

            $data= $query->fetchObject('App\Models\Users');

            if ($data) {
                $result=$data;
            }

        return $result;

    }

    public function add(Users $model)  {

        $now = date('Y-m-d H:i:s');

        $query = $this->_db->prepare('INSERT INTO users(name,user,pass,role,create_at,edited_at) VALUES(:name,:user,:pass,:role,:create_at,:edited_at)');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':user',$model->user);
        $query->bindParam(':pass',password_hash($model->pass, PASSWORD_DEFAULT));
        $query->bindParam(':role',$model->role);
        $query->bindParam(':create_at',$now);
        $query->bindParam(':edited_at',$now);
        $query->execute();

}

public function update(Users $model) :void  {

        $now = date('Y-m-d H:i:s');
        $query = $this->_db->prepare('UPDATE users SET name=:name, user=:user,pass=:pass,role=:role, edited_at=:edited_at WHERE id=:id ');
        $query->bindParam(':name',$model->name);
        $query->bindParam(':user',$model->user);
        $query->bindParam(':pass',password_hash($model->pass, PASSWORD_DEFAULT));
        $query->bindParam(':role',$model->role);
        $query->bindParam(':edited_at',$now);
        $query->bindParam(':id',$model->id);
        $query->execute();

}

public function delete(int $id) :void  {
    
        $query = $this->_db->prepare('DELETE FROM users WHERE id=:id ');  
        $query->bindParam(':id',$id);
        $query->execute();

}


public function verifyLog(string $user, string $pass){

    $query = $this->_db->prepare('SELECT * FROM users WHERE user=:user AND pass=:pass');
    $query->bindParam(':user',$user);
    $query->bindParam(':pass',$pass);
    $query->execute();

    $result = $query->fetchAll();

    return $result;

}

}