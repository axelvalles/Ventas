<?php
require_once 'config.php';
require_once 'vendor/autoload.php';


use App\Services\ClientsServices;
use App\Models\Clients;

$services = new ClientsServices;
$model = new Clients;
$model->name='pedro';
$model->phone='123123123';
$model->dni='1231Users';
$model->id_user='6';




echo '<br>';
echo '<br>';

var_dump($services->getAll());

echo '<br>';
echo '<br>';
