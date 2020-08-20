<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\Sales;


    $services = new SalesRepository;
    $model = new Sales;
    
    
    if(isset($_GET)){
        try {
            echo json_encode($services->getSaleNumber());
        } catch (Exception $e) {
            echo json_encode(null);
        }
    }

    