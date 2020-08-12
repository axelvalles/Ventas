<?php
require_once 'config.php';
require_once 'vendor/autoload.php';


use App\Repositories\ProvidersRepository;
use App\Models\Providers;

$services = new ProvidersRepository;
$model = new Providers;
$model->name='axel valles';
$model->user='axel123';
$model->pass='admin';
$model->role='ADMIN';
$model->id='1';

var_dump( $services->findAll()   );


echo '<br>';
echo '<br>';





echo '<br>';
echo '<br>';
