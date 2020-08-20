<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\Sales;


    $services = new SalesRepository;
    $model = new Sales;
    

    if(isset($_POST)){
        try {
            $id_client   = $_POST['id_client'];
            $id_product  = $_POST['id_product'];
            $id_user = $_POST['id_user'];
            $price = $_POST['price'];
            $cand = $_POST['cand'];
            $total = $_POST['total'];
            $sale_number = $_POST['sale_number'];

            $model->id_client=$id_client;
            $model->id_product=$id_product;
            $model->id_user=$id_user;
            $model->price_by_unit=$price;
            $model->cand=$cand;
            $model->total=$total;
            $model->sale_number=$sale_number;
            echo json_encode($services->Add($model));
        } catch (Exception $e) {
            echo json_encode(null);
        }
    }

    