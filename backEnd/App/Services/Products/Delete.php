<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProductRepository;
use App\Models\Product;

    $services = new ProductRepository;
    $model = new Product;


    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $services->delete($id);
            
    
    }