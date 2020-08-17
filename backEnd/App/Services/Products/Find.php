<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';

use App\Repositories\ProductRepository;
use App\Models\Product;


$services = new ProductRepository;
    $model = new Product;


    if(isset($_POST)){
        try {
        $id = $_POST['id'];
        echo json_encode($services->find($id));
    } catch (Exception $e) {
        echo json_encode(null);
    }
    }

    