<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProvidersRepository;
use App\Models\Providers;


    $services = new ProvidersRepository;
    $model = new Providers;
        
        
    if(isset($_POST)){
        try {
            $name   = cleanVar($_POST['nameEdit']);
            $phone  = cleanVar($_POST['phoneEdit']);
            $dni = cleanVar($_POST['dniEdit']);
            $id = cleanVar($_POST['idEdit']);
            $model->name=$name;
            $model->phone=$phone;
            $model->dni=$dni;
            $model->id=$id;
            echo json_encode($services->update($model));
        } catch (Exception $e) {
            echo json_encode(null);
        }
    }

    