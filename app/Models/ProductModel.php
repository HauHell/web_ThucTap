<?php
namespace App\Models;
use CodeIgniter\Model;
class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey ='product_id';
    protected $allowedFields = [
        'product_name','product_price','product_images', 'product_detail','category_id','product_quantity',
    ];
    public function getProducts(){
        return $this->db->table($this->table)->join('category','product.category_id = category.category_id')
        ->get()->getResult('array');
    }
}