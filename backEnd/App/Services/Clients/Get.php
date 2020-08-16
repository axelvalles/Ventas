<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\ClientsRepository;
use App\Models\Clients;

$service = new ClientsRepository;
$model = new Clients;

if(isset($_GET)){
    echo json_encode($service->findAll());
}

