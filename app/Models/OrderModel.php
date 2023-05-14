<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'cartorder';
    protected $primaryKey ='order_id';
    protected $allowedFields = [
        'order_name','order_address' ,'order_country', 
        'order_city','order_province','order_phone','order_email','order_status','order_customer_id',
    ];
}