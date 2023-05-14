<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
    public function export()
    {
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay = date("m-d-Y", strtotime(date('Y-m-d')));
        $file_name = "danhsachdonhang" . $ngay . ".xlxs";
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
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Address');
        $sheet->setCellValue('D1', 'City');
        $sheet->setCellValue('ED1', 'Phone Number');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Order Status');
        $count = 2;
        foreach ($orders as $order) {
            $sheet->setCellValue('A' . $count, $order['order_id']);
            $sheet->setCellValue('B' . $count, $order['order_name']);
            $sheet->setCellValue('C'. $count, $order['order_address']);
            $sheet->setCellValue('D'. $count, $order['order_city']);
            $sheet->setCellValue('E'. $count, $order['order_phone']);
            $sheet->setCellValue('F'. $count, $order['oder_email']);
            if ($order['order_status'] == 0) {
                $satus =  "Đang Xử Lý";
              } else if ($order['order_status'] == 1) {
                $satus = "Đang Giao";
              } else if ($order['order_status'] == 2) {
                $satus = "Đã Giao";
              } else {
                $satus = "Đã Hủy";
              }
            $sheet->setCellValue('G'. $count, $satus);
            $count++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($file_name);
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=" . basename($file_name) . "");
        header('Expries: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Lenght:' . filesize($file_name));
        flush();
        readfile($file_name);
        exit;
        return ('<script>window.location.assign("/admin/order")</script>');
    }
}
