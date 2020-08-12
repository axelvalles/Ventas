<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProductRepository;
use App\Models\Product;


    $services = new ProductRepository;
    $model = new Product;
        
    if(isset($_POST)){
        try {
        $code = cleanVar($_POST['codeEdit']);
        $descrip  = cleanVar($_POST['descriptionEdit']);
        $price = cleanNumber($_POST['priceEdit']);
        $cost = cleanNumber($_POST['costEdit']);
        $stock = cleanNumber($_POST['stockEdit']);
        $id = $_POST['id'];
        $model->code=$code;
        $model->description=$descrip;
        $model->price=$price;
        $model->cost=$cost;
        $model->stock=$stock;
        $model->id=$id;
        echo json_encode($services->update($model));
    } catch (Exception $e) {
        echo json_encode(null);
    }
    }

    