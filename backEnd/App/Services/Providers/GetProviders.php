<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';

use App\Repositories\ProvidersRepository;
use App\Models\Providers;

    $services = new ProvidersRepository;
    $model = new Providers;


    if(isset($_GET)){
    $res = $services->findAll();
    if ($res) {
        echo json_encode($res);
    }else{
        echo json_encode('error');
    }
    }

    



