<?php
require_once 'config.php';
require_once 'vendor/autoload.php';


use App\Services\ProductServices;
use App\Models\Product;

$services = new ProductServices;
$model = new Product;
$model->code='harina de maiz 4';
$model->description='harina juana';
$model->price='4000';
$model->id_user='1';
$model->id_provider='1';




echo '<br>';
echo '<br>';

var_dump($services->add($model));

echo '<br>';
echo '<br>';
