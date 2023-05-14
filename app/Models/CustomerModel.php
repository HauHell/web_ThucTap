<?php
namespace App\Models;
use CodeIgniter\Model;
class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey ='customer_id';
    protected $allowedFields = [
        'customer_username','customer_password' ,'customer_cart', 'customer_firstname','customer_lastname',
        'customer_country','customer_address','customer_town_city','customer_province','customer_phone','customer_email','customer_images',
    ];
}