<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;


class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $category_model = new CategoryModel();
        $product_model = new ProductModel();
        $categories = $category_model->findAll();
        $products = $product_model->findAll();
        $data['categories'] = $categories;
        $data['products'] = $products;
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            return view('templates/header', $data)
                . view('pages/' . 'home', $data)
                . view('templates/footer');
        }

        return view('templates/header')
            . view('pages/' . 'home', $data)
            . view('templates/footer');
    }
    public function contact()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            return view('templates/header', $data)
                . view('pages/' . 'contact')
                . view('templates/footer');
        }

        return view('templates/header')
            . view('pages/' . 'contact')
            . view('templates/footer');
    }
    public function login()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            return view('templates/header', $data)
                . view('pages/' . 'login')
                . view('templates/footer');
        }

        return view('templates/header')
            . view('pages/' . 'login')
            . view('templates/footer');
    }
    public function register()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            return view('templates/header', $data)
                . view('pages/' . 'register')
                . view('templates/footer');
        }

        return view('templates/header')
            . view('pages/' . 'register')
            . view('templates/footer');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        $category_model = new CategoryModel();
        $product_model = new ProductModel();
        $categories = $category_model->findAll();
        $products = $product_model->findAll();
        $data['categories'] = $categories;
        $data['products'] = $products;
        return '<script>window.location.assign("/login")</script>';
    }

    public function loginAction()
    {

        $session = session();
        $customer_model = new CustomerModel();
        $rs = $customer_model->where('customer_username', $this->request->getPost('customername'))
            ->where('customer_password', $this->request->getPost('customerpassword'))->first();
        if ($rs) {
            $session->set('s_customerid', $rs['customer_id']);
            $session->set('s_customername', $rs['customer_username']);
            $session->set('s_customerpassword', $rs['customer_password']);
            $session->set('s_customercart', $rs['customer_cart']);
            $session->set('s_customerimages', $rs['customer_images']);

            $data = json_decode($rs['customer_cart'], TRUE);

            $session->set('cart', $data);
            return '<script>window.location.assign("/shop")</script>';
        } else {
            return '<script>window.location.assign("/login")</script>';
        }
    }
    public function registerAction()
    {
        $this->validation = \Config\Services::validation();
        $rules = [
            'customername' => 'required',
            'customerpassword' => 'required',
            'customer_repassword' => 'required|matches[customerpassword]',
        ];
        $this->validation->setRules($rules);
        if ($this->validation->run($this->request->getPost())) {
                $customer_model = new CustomerModel();
                $data = [
                    'customer_username' => $this->request->getPost('customername'),
                    'customer_password' => $this->request->getPost('customerpassword'),
                    'customer_images' => 'ironman.jpg',
                ];
                
                $customer_model->insert($data);
                return ('<script>window.location.assign("/login")</script>');
        } else {
            $data['validation'] = $this->validation->getErrors();
            $success = json_encode($data);
            return redirect()->to('/register')->with('success', $success);            
        }
    }
    public function lookup()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            return view('templates/header', $data)
                . view('pages/' . 'lookup')
                . view('templates/footer');
        }

        return view('templates/header')
            . view('pages/' . 'lookup')
            . view('templates/footer');
    }
    public function Search()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
        }
        $product_model = new ProductModel();
        $products = $product_model->like('product_name', $_POST['search'])->findAll();

        $category_model = new CategoryModel();
        $categories = $category_model->findAll();

        $data['getproducts'] = $products;
        $data['categories'] = $categories;
        $data['search'] = $_POST['search'];
        return view('templates/header', $data)
            . view('pages/' . 'shop', $data)
            . view('templates/footer');
    }
    public function listshop()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
        }
        $product_model = new ProductModel();
        $products = $product_model->findAll();
        $getproducts = $product_model->paginate();
        $category_model = new CategoryModel();
        $categories = $category_model->findAll();
        $data['products'] = $products;
        $data['pager'] =  $product_model->pager;
        $data['getproducts'] = $getproducts;
        $data['categories'] = $categories;
        return view('templates/header', $data)
            . view('pages/' . 'shop', $data)
            . view('templates/footer');
    }
    public function productdetail()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
        }

        $product_model = new ProductModel();
        $getproducts = $product_model->where('product_id', $_GET['id'])->first();
        $data['product'] = $getproducts;
        return view('templates/header', $data)
            . view('pages/' . 'productdetail', $data)
            . view('templates/footer');
    }
    public function updateproduct()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
        }

        $product_model = new ProductModel();
        $getproducts = $product_model->where('product_id', $_GET['id'])->first();
        $data['product'] = $getproducts;
        return view('templates/header', $data)
            . view('pages/' . 'updateproduct', $data)
            . view('templates/footer');
    }
    public function addcart()
    {
        $product_model = new ProductModel();
        $products = $product_model->findAll();
        $getproducts = $product_model->where('product_id', $_POST['id'])->first();
        $items = array(
            'id' => $getproducts['product_id'],
            'name' => $getproducts['product_name'],
            'price' => $getproducts['product_price'],
            'image' => $getproducts['product_images'],
            'detail' => $getproducts['product_detail'],
            'category' => $getproducts['category_id'],
            'quantity' => $_POST['quantity'],
        );
        
        $session = session();
        if ($session->has('cart')) {
            $index = $this->exists($_POST['id']);
            $cart = array_values(session('cart'));
            if ($index == -1) {
                array_push($cart, $items);
            } else {
                foreach ($products as $product) {
                    if ($cart[$index]['id'] == $product['product_id']) {
                        if ($cart[$index]['quantity'] + $_POST['quantity'] <= $product['product_quantity']) {
                            $cart[$index]['quantity'] += $_POST['quantity'];
                        }
                    }
                }
            }
            $session->set('cart', $cart);
            if (($session->get('s_customerid'))) {
                $customer_model = new CustomerModel();
                $data = [
                    'customer_cart' => json_encode($cart),
                ];
                $customer_model->update($session->get('s_customerid'), $data);
            }
        } else {
            $cart = array($items);
            $session->set('cart', $cart);
        }
        return '<script>window.location.assign("/shop")</script>';
    }
    private function exists($id)
    {
        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }
    public function total()
    {

        $total = 0;
        $items = array_values(session('cart'));
        if (!empty($items)) {
            foreach ($items as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            return $total;
        }
    }

    public function remove()
    {
        $index = $this->exists($_GET['id']);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session->set('cart', $cart);
        if (!empty($session->get('s_customerid'))) {
            $customer_model = new CustomerModel();
            $data = [
                'customer_cart' => json_encode($cart),
            ];
            $customer_model->update($session->get('s_customerid'), $data);
        }
        return '<script>window.location.assign("/shop")</script>';
    }
    public function update()
    {
        $product_model = new ProductModel();
        $products = $product_model->findAll();
        $session = session();
        if ($session->has('cart')) {

            $index = $this->exists($_POST['id']);
            $cart = array_values(session('cart'));
            if ($index != -1) {
                foreach ($products as $product) {
                    if ($cart[$index]['id'] == $product['product_id']) {
                        if ($_POST['quantity'] <= $product['product_quantity']) {
                            $cart[$index]['quantity'] = $_POST['quantity'];
                        }
                    }
                }
            }
            $session->set('cart', $cart);
            if (!empty($session->get('s_customerid'))) {
                $customer_model = new CustomerModel();
                $data = [
                    'customer_cart' => json_encode($cart),
                ];
                $customer_model->update($session->get('s_customerid'), $data);
            }
        }
        return '<script>window.location.assign("/shop")</script>';
    }

    public function checkout()
    {
        $session = session();
        if ($session->has('cart')) {
            $data['items'] = array_values(session('cart'));
            $data['total'] = $this->total();
            if ($session->get('s_customerid')) {
                $customer_model = new CustomerModel();
                $customers = $customer_model->where('customer_id', $session->get('s_customerid'))->first();
                $data['customers'] = $customers;
            }
            return view('templates/header', $data)
                . view('pages/' . 'checkout', $data)
                . view('templates/footer');
        }
        return view('templates/header')
            . view('pages/' . 'checkout')
            . view('templates/footer');
    }
    public function placeorder()
    {
        $session = session();
        $order_model = new OrderModel();
        $product_model = new ProductModel();
        $products = $product_model->findAll();
        $orderdetail_model = new OrderDetailModel();
        $data = [
            'order_name' => $_POST['last_name'] . " " . $_POST['first_name'],
            'order_address' => $_POST['address'],
            'order_country' => $_POST['country'],
            'order_city' => $_POST['city'],
            'order_province' => $_POST['province'],
            'order_phone' => $_POST['phone'],
            'order_email' => $_POST['email'],
            'order_status' => 0,
            'order_customer_id' => $session->get('s_customerid'),
        ];
        $order_model->insert($data);

        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {

            $datadetail = array(
                'order_id' => $order_model->getInsertID(),
                'product_id' => $items[$i]['id'],
                'order_quantity' => $items[$i]['quantity']
            );
            $orderdetail_model->insert($datadetail);
        }
        $orderdetails = $orderdetail_model->where('order_id', $order_model->getInsertID())->findAll();
        for ($i = 0; $i < count($orderdetails); $i++) {
            foreach ($products as $product) {
                if ($orderdetails[$i]['product_id'] == $product['product_id']) {
                    $dataupdate = [
                        'product_quantity'    => $product['product_quantity'] - $orderdetails[$i]['order_quantity'],
                    ];
                    $product_model->update($product['product_id'], $dataupdate);
                }
            }
        }
        $session = session();
        $session->has('cart');
        $session->destroy();
        if (!empty($session->get('s_customerid'))) {
            $customer_model = new CustomerModel();
            $data = [
                'customer_cart' => '',
            ];
            $customer_model->update($session->get('s_customerid'), $data);
        }

        return ('<script>window.location.assign("/placeorder?id=' . $order_model->getInsertID() . '")</script>');
    }

    public function placeorderdetail()
    {
        $orderdetail_model = new OrderDetailModel();
        $orderdetails = $orderdetail_model->getPlaceOrder($_GET['id']);
        $data['orderdetails'] = $orderdetails;
        return view('templates/header')
            . view('pages/' . 'placeorderdetail', $data)
            . view('templates/footer');
    }
    public function lookuporder()
    {
        return ('<script>window.location.assign("/placeorder?id=' . $_POST['id'] . '")</script>');
    }

    public function CheckQuantity()
    {
        if ($this->request->isAJAX()) {
            $quantity = service('request')->getPost('quantity');
            return  $quantity;
        }
    }
    public function profile()
    {

        $session = session();
        if ($session->get('s_customerid')) {
            $customer_model = new CustomerModel();
            $customers = $customer_model->where('customer_id', $session->get('s_customerid'))->first();
            $order_model = new OrderModel();
            $orders =$order_model->where('order_customer_id',$session->get('s_customerid'))->orderBy('order_id', 'DESC')->findAll();
            $data['orders'] = $orders;
            $data['customers'] = $customers;
            if ($session->has('cart')) {
                $data['items'] = array_values(session('cart'));
                $data['total'] = $this->total();
               
            }
            return view('templates/header', $data)
            . view('pages/' . 'profile', $data)
            . view('templates/footer');
        }
        
        return view('templates/header')
            . view('pages/' . 'profile')
            . view('templates/footer');
    }
    public function changepassword()
    {
        $customer_model = new CustomerModel();
        $session = session();
        if($_POST['oldpassword']==$session->get('s_customerpassword'))
        {
            if($_POST['newpassword']==$_POST['confirmpassword']){
                $data = [
                    'customer_password' => $_POST['newpassword'],
                ];
                $customer_model->update($session->get('s_customerid'), $data);
                $session->set('s_customerpassword', $_POST['newpassword']);
            }
        }
        return '<script>window.location.assign("/profile")</script>';
    }
    public function updateprofile(){
        $customer_model = new CustomerModel();
        $image = $this->request->getFile('image');
        if ($image->isValid()) {
            $image->move('./assetsclient/avatars');
        }
        $imagename = $image->getName();
        if (!empty($imagename)) {
            if ($_POST['oldimage'] != null) {
                unlink('./assetsclient/avatars/' . $_POST['oldimage']);
            }
        }
        if ($imagename == "") {
            $imagename = $_POST['oldimage'];
        }
        $data = [
            'customer_firstname	' => $_POST['first_name'] ,
            'customer_lastname' => $_POST['last_name'],
            'customer_address' => $_POST['address'],
            'customer_country' => $_POST['country'],
            'customer_town_city' => $_POST['city'],
            'customer_province' => $_POST['province'],
            'customer_phone' => $_POST['phone'],
            'customer_email' => $_POST['email'],
            'customer_images' => $imagename, 
        ];
        $session = session();
        $customer_model->update($session->get('s_customerid'), $data);
        $session->set('s_customerimages', $imagename);
        return '<script>window.location.assign("/profile")</script>';
    }
}
