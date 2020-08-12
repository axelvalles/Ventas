<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';

use App\Repositories\ProductRepository;
use App\Models\Product;


$services = new ProductRepository;
    $model = new Product;


    if(isset($_GET)){
    $res = $services->findAll();
    if ($res) {
        echo json_encode($res);
    }else{
        echo json_encode('error');
    }
    }

    