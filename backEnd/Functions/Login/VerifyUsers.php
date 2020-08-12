<?php

require_once '../../config.php';
require_once '../../vendor/autoload.php';

use App\Services\UsersServices;
use App\Models\Users;





    $services = new UsersServices;
    $model = new Users;


if(isset($_POST)){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $res = $services->verifyLog($user,$password);

    if ($res) {
        echo json_encode('ok');
    }else{
        echo json_encode( 'no existe el usuario' );
    }

}

    
