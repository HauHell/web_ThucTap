<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'product_order';
    protected $primaryKey ='pd_id';
    protected $allowedFields = [
        'order_id','product_id','order_quantity',
        
    ];
    public function getPlaceOrder($id) {
        return $this->db->table($this->table)->join('cartorder','product_order.order_id = cartorder.order_id')
        ->join('product','product_order.product_id = product.product_id')->where('cartorder.order_id',$id)
        ->get()->getResult('array');
    }
    public function getOrder() {
        return $this->db->table($this->table)->join('cartorder','product_order.order_id = cartorder.order_id')
        ->join('product','product_order.product_id = product.product_id')->get()->getResult('array');
    }

}