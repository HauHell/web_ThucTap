<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
class Product extends BaseController
{

    public function listProduct()
    {
        $product_model = new ProductModel();
        $products = $product_model->getProducts();
        $getproducts = $product_model->findAll();
        $category_model = new CategoryModel();
        $categories = $category_model->findAll();
        $data['title'] = "List Product";
        $data['products'] = $products;
        $data['getproducts'] = $getproducts;
        $data['categories'] = $categories;
        $category_model = new \App\Models\CategoryModel();
        $categories = $category_model->findAll();
        $data['categories'] = $categories;
        $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/productList", $data);
        return view('Views/admin/main', $data);
    }
    
    public function add(){
       
        $product_model = new ProductModel();
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
           
            $image->move('./assets/products');
        }
        $imagename = $image->getName();
        $data = [
            'product_name' => $_POST['name'],
            'product_price' => $_POST['price'],
            'product_images' => $imagename,
            'product_detail' => $_POST['detail'],
            'category_id' => $_POST['category'],
            'product_quantity' => $_POST['quantity'],
        ];

        $product_model->insert($data);
        return ('<script>window.location.assign("/admin/product")</script>');
    }
    public function edit(){
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $image->move('./assets/products');
        }
        $imagename = $image->getName();
        if(!empty($imagename)) {
            if($_POST['oldimage']!=null){
                unlink('./assets/products/' . $_POST['oldimage']);
            }  
        }

        if ($imagename == "") {
            $imagename = $_POST['oldimage'];
        }
        $product_model = new ProductModel();
        $data = [
            'product_name' => $_POST['name'],
            'product_price' => $_POST['price'],
            'product_images' =>  $imagename,
            'product_detail'    => $_POST['detail'],
            'category_id'    => $_POST['category'],
            'product_quantity'    => $_POST['quantity'],
        ];
        $product_model->update($_POST['id'], $data);
        return ('<script>window.location.assign("/admin/product")</script>');
    }
 
    public function delete(){
        if($_POST['image']!=""){
            unlink('./assets/products/' . $_POST['image']);
        }
        $product_model = new ProductModel();
        $product_model->delete($_POST['id']);
        return ('<script>window.location.assign("/admin/product")</script>');
    }

   
  
}
