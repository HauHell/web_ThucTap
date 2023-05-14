<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
class Order extends BaseController
{
    public function listOrder()
    {
        $order_model = new OrderModel();
        $orderdetail_model = new OrderDetailModel();
        $product_model = new ProductModel();
        $old_orders = $order_model->findAll();
        $orders = array();
        foreach ($old_orders as $order) {
            $old_orderdetails = $orderdetail_model->where('order_id', $order['order_id'])->findAll();
            $orderdetails = array();
            foreach ($old_orderdetails as $product) {
                $product['product'] = $product_model->where('product_id', $product['product_id'])->first();
                $orderdetails[] = $product;
            }
            $order['orderdetails'] = $orderdetails;
            $orders[] = $order;
        }
        $data['orders'] = $orders;
        $data['title'] = "List Order";
        $data['left'] = view("Views/admin/layout/left");
        $data['head'] = view("Views/admin/layout/head");
        $data['content'] = view("Views/admin/pages/orderList", $data);

        return view('Views/admin/main', $data);
    }


    public function edit()
    {
        $order_model = new OrderModel();
        $data = [
            'order_status'    => $_POST['status'],
        ];
        $order_model->update($_POST['id'], $data);
        return ('<script>window.location.assign("/admin/order")</script>');
    }
    public function delete()
    {
        $order_model = new OrderModel();
        $old_orders = $order_model->findAll();
        $orderdetail_model = new OrderDetailModel();
        $product_model = new ProductModel();
        $products = $product_model->findAll();
        $data = [
            'order_status'    => 3,
        ];
        foreach ($old_orders as $order) {
            $orderdetails = $orderdetail_model->where('order_id', $order['order_id'])->findAll();
            foreach ($orderdetails as $product_order) {
                foreach ($products as $product) {
                    if ($product_order['product_id'] == $product['product_id']) {
                        $dataupdate =[
                            'product_quantity'    =>$product['product_quantity']+$product_order['order_quantity'],
                        ];
                        $product_model->update($product['product_id'], $dataupdate);
                    }
                }
            }
        }
        $order_model = new OrderModel();
        $order_model->update($_POST['id'], $data);
        return ('<script>window.location.assign("/admin/order")</script>');
    }
}
