<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\Sales;


    $services = new SalesRepository;
    $model = new Sales;

    if(isset($_GET)){
        $res = $services->findAll();
        if ($res) {
            echo json_encode($res);
        }else{
            echo json_encode('error');
        }
        }