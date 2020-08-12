<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProductRepository;
use App\Models\Product;


    $services = new ProductRepository;
    $model = new Product;
        
    if(isset($_POST)){

        session_start();
        
            $code  = ($_POST['codeAdd']);
            $descrip  = ($_POST['descriptionAdd']);
            $price = ($_POST['priceAdd']);
            $cost = ($_POST['costAdd']);
            $stock = ($_POST['stockAdd']);
            $id_provider = $_POST['providerAdd'];
            $model->code=$code;
            $model->description=$descrip;
            $model->price=$price;
            $model->cost=$cost;
            $model->stock=$stock;
            $model->id_provider=$id_provider;
            $model->id_user=$_SESSION['user']['id'];
            echo json_encode($model);
        
    }


    