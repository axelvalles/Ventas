<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\Sales;


    $services = new SalesRepository;
    $model = new Sales;
        
    echo json_encode($_POST);
        /*
    if(isset($_POST)){
        try {
            $name   = cleanVar($_POST['nameAdd']);
            $phone  = cleanVar($_POST['phoneAdd']);
            $dni = cleanVar($_POST['dniAdd']);
            $model->name=$name;
            $model->phone=$phone;
            $model->dni=$dni;
            $model->id_user=$_SESSION['user']['id'];
            echo json_encode($services->add($model));
        } catch (Exception $e) {
            echo json_encode(null);
        }
    }

    