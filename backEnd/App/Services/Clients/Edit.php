<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ClientsRepository;
use App\Models\Clients;

$service = new ClientsRepository;
$model = new Clients;

if(isset($_POST)){
    try{
    $name = cleanVar($_POST['nameEdit']);
    $phone = cleanVar($_POST['phoneEdit']);
    $dni = cleanVar($_POST['dniEdit']);
    $id = ($_POST['idEdit']);
    $model->name=$name;
    $model->phone=$phone;
    $model->dni=$dni;
    $model->id=$id;
    echo json_encode($service->update($model));
    }catch (Exception $e) {
        echo json_encode(null);
    }
}