<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProductRepository;
use App\Models\Product;


    $services = new ProductRepository;
    $model = new Product;



    if(isset($_POST)){
        try{
        session_start();
            $code  = cleanVar($_POST['codeAdd']);
            $descrip  = cleanVar($_POST['descriptionAdd']);
            $price = cleanNumber($_POST['priceAdd']);
            $cost = cleanNumber($_POST['costAdd']);
            $stock = cleanNumber($_POST['stockAdd']);
            $id_provider = $_POST['providerAdd'];
            $model->code=$code;
            $model->description=$descrip;
            $model->price=$price;
            $model->cost=$cost;
            $model->stock=$stock;
            $model->id_provider=$id_provider;
            $model->id_user=$_SESSION['user']['id'];
            echo json_encode($services->add($model));
        }catch (Exception $e) {
            echo json_encode(null);
        }
        
    }

    