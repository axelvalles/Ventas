<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\SaleHeader;

$services = new SalesRepository;
$model = new SaleHeader;
    

    if(isset($_POST)){
        try {
            $id_client   = $_POST['id_client'];
            $id_user = $_POST['id_user'];
            $total = $_POST['total'];
            $sale_number = $_POST['sale_number'];

            $model->id_client=$id_client;
            $model->id_user=$id_user;
            $model->total=$total;
            $model->sale_number=$sale_number;
            echo json_encode($services->AddHeader($model));
        } catch (Exception $e) {
            echo json_encode(null);
        }
    }

    