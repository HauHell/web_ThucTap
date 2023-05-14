<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CustomerModel;
class Customer extends BaseController
{
   
    public function listCustomer()
    {
        $customer_model = new CustomerModel();
        $customers = $customer_model->findAll();
        $data['title'] = "List Customer Account";
        $data['customers'] = $customers;
        $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/customerList", $data);
        return view('Views/admin/main', $data);
    }

    public function add(){
        $customer_model = new CustomerModel();
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
           
            $image->move('./assetsclient/avatars');
        }
        $imagename = $image->getName();
        $data = [
            'customer_username' => $_POST['username'],
            'customer_password' => $_POST['password'],
            'customer_firstname' => $_POST['firstname'],
            'customer_lastname' => $_POST['lastname'],
            'customer_address' => $_POST['address'],
            'customer_country' => $_POST['country'],
            'customer_town_city' => $_POST['town_city'],
            'customer_province' => $_POST['province'],
            'customer_phone' => $_POST['phone'],
            'customer_email' => $_POST['email'],
            'customer_images' => $imagename, 
        ];
       
        $customer_model->insert($data);
        return ('<script>window.location.assign("/admin/customeraccount")</script>');
    }

    public function edit(){
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $image->move('./assets/avatars');
        }
        $imagename = $image->getName();
        if(!empty($imagename)) {
            if($_POST['oldimage']!=null){
                unlink('./assets/avatars/' . $_POST['oldimage']);
            }  
        }

        if ($imagename == "") {
            $imagename = $_POST['oldimage'];
        }
        $customer_model = new customerModel();
        $data = [
            'customer_username' => $_POST['username'],
            'customer_password' => $_POST['password'],
            'customer_firstname' => $_POST['firstname'],
            'customer_lastname' => $_POST['lastname'],
            'customer_address' => $_POST['address'],
            'customer_country' => $_POST['country'],
            'customer_town_city' => $_POST['town_city'],
            'customer_province' => $_POST['province'],
            'customer_phone' => $_POST['phone'],
            'customer_email' => $_POST['email'],
            'customer_images' => $imagename, 
        ];
        $customer_model->update($_POST['id'], $data);
        $session = session();
        $session->set('s_image',$imagename);
        return ('<script>window.location.assign("/admin/customeraccount")</script>');
    }

    public function delete(){
        if($_POST['image']!=""){
            unlink('./assetsclient/avatars/' . $_POST['image']);
        }
        $customer_model = new CustomerModel();
        $customer_model->delete($_POST['id']);
        return ('<script>window.location.assign("/admin/customeraccount")</script>');
    }
}
