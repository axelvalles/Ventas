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
    session_start();
    $name = cleanVar($_POST['nameAdd']);
    $phone = cleanVar($_POST['phoneAdd']);
    $dni = cleanVar($_POST['dniAdd']);
    $model->name=$name;
    $model->phone=$phone;
    $model->dni=$dni;
    $model->id_user=$_SESSION['user']['id'];
    echo json_encode($service->add($model));
    }catch (Exception $e) {
        echo json_encode(null);
    }
}