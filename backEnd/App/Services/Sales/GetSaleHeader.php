<?php

require_once '../../../config.php';
require_once '../../../vendor/autoload.php';
require_once '../../../Functions/Functions.php';

use App\Repositories\SalesRepository;
use App\Models\SaleHeader;

$services = new SalesRepository;
$model = new SaleHeader;

if(isset($_GET)){
    try {
        echo json_encode($services->findHeader());
    } catch (Exception $e) {
        echo json_encode(null);
    }
}