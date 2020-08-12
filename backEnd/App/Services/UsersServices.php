<?php
namespace App\Services;

use App\Models\Users;
use App\Repositories\UsersRepository;
use PDOException;


class UsersServices{

    private $_Repos;

    public function __construct()
    {
        $this->_Repos = new UsersRepository;
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

    public function getById(int $id): ?Users  {

        $result = null;

        try {
            $result = $this->_Repos->find($id);
        } catch (PDOException $ex) {
            echo $ex;
        }
        return $result;

    }

    public function add(Users $model) :void  {
        try {
            $this->_Repos->add($model);
            echo json_encode('usuario creado exitosamente');
            
        } catch (PDOException $ex) {
            echo json_encode($ex);
        }

    }

    public function update(Users $model) :void  {

        try {
            $this->_Repos->update($model);
            echo 'usuario actualizado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function delete(int $id) :void  {

        try {
            $this->_Repos->delete($id);
            echo 'usuario eliminado exitosamente';

        } catch (PDOException $ex) {
            echo $ex;
        }

    }

    public function verifyLog(string $user, string $pass){

        try {
            $result= $this->_Repos->verifyLog($user,$pass);

            if($result){

                session_start();
                $_SESSION['user']= array(
                    'user' => $result[0]->user,
                    'rol' => $result[0]->role,
                    'id' => $result[0]->id

                );
            }else{
                $result=null;
            }

        } catch (PDOException $ex) {
            echo $ex;
        }

        return $result;

    }
}