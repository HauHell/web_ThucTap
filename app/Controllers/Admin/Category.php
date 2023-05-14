<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public function listCategory()
    {
        $category_model = new CategoryModel();
        $categories = $category_model->findAll();
        $data['title'] = "List Category";
        $data['categories'] = $categories;
        $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/categoryList", $data);
        return view('Views/admin/main', $data);
    }
    public function add(){
        $category_model = new CategoryModel();
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
           
            $image->move('./assets/categories');
        }
        $imagename = $image->getName();
        $data = [
            'category_name' => $_POST['name'],
            'category_detail' => $_POST['detail'],
            'category_images' => $imagename,
           
        ];
        $category_model->insert($data);
        return ('<script>window.location.assign("/admin/category")</script>');
    }

    public function edit(){
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $image->move('./assets/categories');
        }
        $imagename = $image->getName();
        if(!empty($imagename)) {
            if($_POST['oldimage']!=null){
                unlink('./assets/categories/' . $_POST['oldimage']);
            }  
        }

        if ($imagename == "") {
            $imagename = $_POST['oldimage'];
        }
        $category_model = new CategoryModel();
        $data = [
            'category_name' => $_POST['name'],
            'category_detail' => $_POST['detail'],
            'category_images' => $imagename,
           
        ];
        $category_model->update($_POST['id'], $data);
        return ('<script>window.location.assign("/admin/category")</script>');
    }
  
    public function delete(){
        if($_POST['image']!=""){
            unlink('./assets/categories/' . $_POST['image']);
        }
        $category_model = new CategoryModel();
        $category_model->delete($_POST['id']);
        return ('<script>window.location.assign("/admin/category")</script>');
    }

   
  
}
