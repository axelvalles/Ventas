<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ProvidersRepository;
use App\Models\Providers;

    $services = new ProvidersRepository;
    $model = new Providers;


    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $services->delete($id);
        
    }