<?php

namespace App\Models;

class Sale{
    public $id; 	
    public $id_client;
    public $id_product; 	
    public $id_user;
    public $price_by_unit; 	
    public $cand;
    public $total;
    public $sale_number;
    public $create_at; 	
    public $edited_at;
}